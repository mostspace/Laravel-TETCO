<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\ServerSideTable;
use App\User;
use App\School;
use App\EducationalLevel;
use App\Grade;
use Auth;

class SchoolController extends Controller
{

    // Home
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
        $grades = Grade::select('B.level_name', 'A.grade', 'A.seats', 'A.actual_price', 'A.citizenship_status')
                        ->from('grades as A')
                        ->leftJoin('educational_levels as B', 'A.edu_level', '=', 'B.id')
                        ->where('A.school_id', '=', $school_id)
                        ->get();

        foreach ($grades as $grade) {
            $grade->final_price = $this->calculateFinalPriceWithVat($grade->level_name, $grade->citizenship_status, $grade->seats);
        }

        $dataTable = new ServerSideTable($grades);
        $dataTable->getAjaxTable();
    }


    // Schools Actual Price

    public function schoolsActualPrice()
    {
        return view('schools-actual-price.index');
    }

    public function schoolGrades(Request $request, $school_id)
    {
        $school = School::where('id', $school_id)->first('name');

        return view('schools-actual-price.grades', compact('school_id', 'school'));
    }

    public function getSchoolGrades(Request $request, $school_id) {
        // $grades = Grade::where('school_id', $school_id)->get();
        $grades = Grade::select('B.level_name', 'A.grade', 'A.seats', 'A.actual_price')
                    ->from('grades as A')
                    ->leftJoin('educational_levels as B', 'A.edu_level', '=', 'B.id')
                    ->where('A.school_id', '=', $school_id) // Use dynamic school ID
                    ->get();

        $dataTable = new ServerSideTable($grades);
        $dataTable->getAjaxTable();
    }

    // School Price Limit

    public function schoolPriceLimit() {
        return view('school-price-limit.index');
    }

    public function getSchoolPriceLimit() {
        $levels = EducationalLevel::all();

        $dataTable = new ServerSideTable($levels);
        $dataTable->getAjaxTable();
    }

    // Add Grade
    public function addGrade(Request $request) {
        $formData = $request->input('data');

        $edu_level = EducationalLevel::where('level_name', $formData['edu_level'])->get();

        dd($edu_level);

        $grade = new Grade;

        $grade->school_id = $request->input('school_id');
        $grade->edu_level = $edu_level->id;
        $grade->school_id = $school_id;
        $grade->school_id = $school_id;

    }


    // Algorithm

    public function calculateFinalPriceWithVat($educationalLevel, $isCitizen, $numSeats)
    {
        // Base price limits by educational level, assumed to be VAT-exclusive
        $priceLimits = [
            'KG' => 15000,
            'Elementary' => 18000,
            'Intermediate' => 23000,
            'High School' => 26000,
        ];

        // Determine the base limit for the given educational level
        $baseLimit = $priceLimits[$educationalLevel];

        // Determine the discount rate based on the number of seats
        if ($numSeats >= 1 && $numSeats <= 10) {
            $discountRate = 0.10;
        } elseif ($numSeats >= 11 && $numSeats <= 29) {
            $discountRate = 0.20;
        } elseif ($numSeats >= 30) {
            $discountRate = 0.30;
        } else {
            $discountRate = 0;  // Default case
        }

        // Apply discount to the base limit
        $discountedPrice = $baseLimit * (1 - $discountRate);

        // Add VAT for non-Citizens, if applicable
        if (!$isCitizen) {
            $priceWithVat = $discountedPrice * 1.15;
        } else {
            $priceWithVat = $discountedPrice;
        }

        // Enforce the ministry limit strictly for both citizens and non-citizens
        $finalPrice = min($priceWithVat, $baseLimit);

        // return response()->json([
        //     'educational_level' => $educationalLevel,
        //     'is_citizen' => $isCitizen,
        //     'num_seats' => $numSeats,
        //     'final_price' => number_format($finalPrice, 2),
        // ]);

        return number_format($finalPrice, 2);
    }

    // Example usage
    public function exampleUsage()
    {
        $educationalLevel = 'Elementary';
        $isCitizen = false;  // Change to true for citizens
        $numSeats = 20;

        $finalPrice = $this->calculateFinalPriceWithVat($educationalLevel, $isCitizen, $numSeats);
        return $finalPrice;
    }
}
