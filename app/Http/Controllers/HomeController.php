<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\ServerSideTable;
use App\User;
use App\School;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getSchoolList(Request $request) {
        $schools = School::all();

        $dataTable = new ServerSideTable($schools);
        $dataTable->getAjaxTable();
    }
}
