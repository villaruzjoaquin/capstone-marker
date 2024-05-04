<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use App\Models\Group;
use App\Models\Section;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $query = Student::with('group.section');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhereHas('group.section', function ($sq) use ($search) {
                    $sq->where('section_code', 'like', '%' . $search . '%');
                });
            });
        }

        $students = $query->paginate(10);

        $students->appends($request->only('search'));

        return view('students.index', compact('students'));
    }


    public function create()
    {
        $groups = Group::all(); 
        $sections = Section::all(); 

        return view('students.create', compact('groups', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'strengths' => [
                'required',
                'in:developer,designer,fullstack',
                function ($attribute, $value, $fail) {
                    if ($value === 'default') {
                        $fail('Please select a valid strength.');
                    }
                },
            ],
            'comments' => 'nullable|string|max:600',
            'group_id' => [
                'required',
                'exists:groups,id',
                function ($attribute, $value, $fail){
                    if($value == 'default'){
                        $fail('Please select a group.');
                    }
                }
            ],
        ], [
            'first_name.required' => 'First Name field cannot be empty.',
            'last_name.required' => 'Last Name field cannot be empty.',
            'group_id.exists' => 'Group has to exist',
            'group_id.required' => "Please select a valid group.",
            'strengths.required' => 'Please choose at least one.',
            'comments.max' => 'Comments cannot be longer than 600 characters',
        ]);
        

        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->comments = $request->comments;
        $student->group_id = $request->group_id;

        $strengthsToColor = [
            'developer' => '#FF0000', // Red for Developer
            'designer' => '#0000FF', // Blue for Designer
            'fullstack' => '#800080', // Purple for Full Stack
        ];
        

        $student->color_code = $strengthsToColor[$request->strengths];

        $student->save();

        return redirect()->route('dashboard')->with('success', 'Student created successfully!');
    }


    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|min:1|max:60',
            'last_name' => 'required|min:1|max:60',
            'color_code' => 'nullable',
            'comments' => 'nullable|string',
        ], [       
            'first_name.min' => 'first name cannot be empty.',
            'first_name.max' => 'first name must not be greater than 60 characters.',        
            'last_name.min' => 'last name cannot be empty.',
            'last_name.max' => 'last name must not be greater than 60 characters.',
        ]);

        $student = Student::findOrFail($id);

        $student->fill($validatedData);
        $student->save();

        return redirect()->route('dashboard')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

}
