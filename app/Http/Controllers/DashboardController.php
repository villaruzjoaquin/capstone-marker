<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Display the sections in the dashboard
    public function index(){
        $sections = Section::all();
        return view('dashboard', compact('sections'));
    }

    public function nukeDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Group::truncate();
        Section::truncate();
        Student::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->route('dashboard')->with('success', 'All student data has been wiped out.');
    }


}
