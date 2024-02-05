<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Utils\ServerSideTable;
use App\User;
use App\School;
use App\DiscountMatrix;
use App\EducationalLevel;
use App\Grade;
use Auth;

class SchoolController extends Controller
{

    // =======================================  Home  ===================================================

    public function home()
    {
        return view('home');
    }

    public function getSchoolList(Request $request) {
        $schools = School::all();

        $dataTable = new ServerSideTable($schools);
        $dataTable->getAjaxTable();
    }

    public function schoolFinalPrice(Request $request, $school_id) {
        $school = School::where('id', $school_id)->first('name');

        return view('school-final-price', compact('school_id', 'school'));
    }

    public function getGradeFinalPrice(Request $request, $school_id)
    {
        $grades = Grade::select('B.level_name', 'B.price_limit', 'A.grade', 'A.seats', 'A.actual_price', 'A.citizenship_status')
                        ->from('grades as A')
                        ->leftJoin('educational_levels as B', 'A.edu_level', '=', 'B.id')
                        ->where('A.school_id', '=', $school_id)
                        ->get();

        foreach ($grades as $grade) {
            $grade->citizen_final_price = $this->calculateFinalPriceWithVat($grade->price_limit, $grade->actual_price, true, $grade->seats);
            $grade->non_citizen_final_price = $this->calculateFinalPriceWithVat($grade->price_limit, $grade->actual_price, false, $grade->seats);
        }

        $dataTable = new ServerSideTable($grades);
        $dataTable->getAjaxTable();
    }

    // =======================================  Schools Actual Price  ===================================================

    public function schoolsActualPrice()
    {
        return view('schools-actual-price.index');
    }

    public function schoolGrades(Request $request, $school_id)
    {
        $school = School::where('id', $school_id)->first('name');

        return view('schools-actual-price.actual-price', compact('school_id', 'school'));
    }

    public function getSchoolGrades(Request $request, $school_id) {
        // $grades = Grade::where('school_id', $school_id)->get();
        $grades = Grade::select('B.level_name', 'A.id', 'A.grade', 'A.seats', 'A.actual_price')
                    ->from('grades as A')
                    ->leftJoin('educational_levels as B', 'A.edu_level', '=', 'B.id')
                    ->where('A.school_id', '=', $school_id) // Use dynamic school ID
                    ->get();

        $dataTable = new ServerSideTable($grades);
        $dataTable->getAjaxTable();
    }

    public function updateActualPrice(Request $request) {
        try {
            if ($request->input('target') == "seats") {
                $request->validate([
                    'id' => 'required|int',
                    'target' => 'required|string',
                    'value' => 'required|int',
                ]);
            } else {
                $request->validate([
                    'id' => 'required|int',
                    'target' => 'required|string',
                    'value' => 'required|numeric',
                ]);
            }            
    
            $id = $request->input('id');
            $target = $request->input('target');
            $newValue = $request->input('value');
    
            $grade = Grade::where('id', $id);

            if ($grade) {
                $grade->update([$target => $newValue]);

                if ($target == "seats") {
                    $message = 'Available seats updated successfully.';
                } else {
                    $message = 'Actual price updated successfully.';
                }
                return response()->json(['result' => 'success', 'message' => $message]);
                
            } else {
                return response()->json(['result' => 'warning', 'message' => 'The corresponding data cannot be found or the target field does not exist'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['result' => 'danger', 'message' => 'An error occurred.'], 500);
        }
    }
    
    // =======================================  School Price Limit  ===================================================

    public function schoolPriceLimit() {
        return view('school-price-limit.index');
    }

    public function getSchoolPriceLimit() {
        $levels = EducationalLevel::all();

        $dataTable = new ServerSideTable($levels);
        $dataTable->getAjaxTable();
    }

    public function updatePriceLimit(Request $request) {
        try {
            $educationalLevelId = $request->input('id');
            $newPriceLimit = $request->input('price_value');
        
            // Retrieve the educational level by ID
            $educationalLevel = EducationalLevel::find($educationalLevelId);
    
            if ($educationalLevel) {
                // Update the price_limit field
                $educationalLevel->update(['price_limit' => $newPriceLimit]);
        
                return response()->json(['result' => 'success', 'message' => 'Price limit updated successfully']);
            }
            return response()->json(['result' => 'warning', 'message' => 'Educational level not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => 'danger', 'message' => 'An error occurred.'], 500);
        }
    }

    // =======================================  Discount Matrix  ===================================================

    public function discountMatrix() {
        return view('discount-matrix.index');
    }

    public function getDiscountMatrix(Request $request) {
        $data = DiscountMatrix::all();

        $dataTable = new ServerSideTable($data);
        $dataTable->getAjaxTable();
    }

    public function updateDiscountMatrix(Request $request) {
        try {
            if ($request->input('target') == "from" or $request->input('target') == "to") {
                $request->validate([
                    'id' => 'required|numeric',
                    'target' => 'required|string', // Add appropriate validation rules
                    'value' => 'required|int', // Add appropriate validation rules
                ]);
            } else {
                $request->validate([
                    'id' => 'required|int',
                    'target' => 'required|string',
                    'value' => 'required|numeric',
                ]);
            } 

            $id = $request->input('id');
            $target = $request->input('target');
            $newValue = $request->input('value');
        
            // Retrieve the educational level by ID
            $discountMatrix = DiscountMatrix::find($id);
    
            if ($discountMatrix) {
                // Update the price_limit field
                $discountMatrix->update([$target => $newValue]);
        
                return response()->json(['result' => 'success', 'message' => 'Price limit updated successfully']);
            }
            return response()->json(['result' => 'warning', 'message' => 'Educational level not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => 'danger', 'message' => 'An error occurred.'], 500);
        }
    }
    

    // Add Grade
    // public function addGrade(Request $request) {
    //     $formData = $request->input('data');

    //     $edu_level = EducationalLevel::where('level_name', $formData['edu_level'])->get();

    //     dd($edu_level);

    //     $grade = new Grade;

    //     $grade->school_id = $request->input('school_id');
    //     $grade->edu_level = $edu_level->id;
    //     $grade->school_id = $school_id;
    //     $grade->school_id = $school_id;

    // }


    // =======================================  Caculate Final Price With VAT  ===================================================

    public function calculateFinalPriceWithVat($priceLimit, $actualPrice, $isCitizen, $numSeats)
    {
        // Discount Rate
        $discountMatrix = DiscountMatrix::all();

        // Determine the discount rate based on the number of seats
        $discountRate = 0; // Default case

        foreach ($discountMatrix as $discountEntry) {
            if ($numSeats >= $discountEntry->from && ($numSeats <= $discountEntry->to || is_null($discountEntry->to))) {
                $discountRate = $discountEntry->applied_discount * 0.01;
                break;
            }
        }

        // Apply discount to the base limit
        $discountedPrice = $actualPrice * (1 - $discountRate);

        // Add VAT for non-Citizens, if applicable
        $vatMultiplier = $isCitizen ? 1.0 : 1.15;
        $priceWithVat = $discountedPrice * $vatMultiplier;

        // Enforce the ministry limit strictly for both citizens and non-citizens
        $finalPrice = min($priceWithVat, $priceLimit);

        // Format the final price with two decimal places
        return number_format($finalPrice, 2);
    }
}
