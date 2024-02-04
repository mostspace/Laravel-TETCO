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
    public function getSchoolList(Request $request) {
        $schools = School::all();

        $dataTable = new ServerSideTable($schools);
        $dataTable->getAjaxTable();
    }
    
    public function schoolsActualPrice() {
        
    }
}
