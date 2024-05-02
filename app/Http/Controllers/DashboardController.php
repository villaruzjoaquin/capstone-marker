<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Group;
use App\Models\Student;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Display the sections in the dashboard
    public function index(){

        if (!auth()->check()) {
            // Redirect the user to the login screen
            return redirect()->route('login');
        }

        $sections = Section::all();
        $todos = Todo::with('group')->paginate(3);
        return view('dashboard', compact('sections', 'todos'));
    }

    public function nukeDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Group::truncate();
        Section::truncate();
        Student::truncate();
        Todo::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->route('dashboard')->with('success', 'All student data has been wiped out.');
    }


}
