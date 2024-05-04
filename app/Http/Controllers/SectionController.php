<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{

    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    public function create()
    {

        return view('sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'section_code' => 'required|string|max:255',
            'description' => 'nullable|string|max:300',
        ]);

        $section = new Section;
        $section->course_name = $request->course_name;
        $section->section_code = $request->section_code;
        $section->description = $request->description;
        $section->save();

        return redirect()->route('dashboard')->with('success', 'Section created successfully!');
    }

    public function show(Section $section)
    {
        $groups = $section->groups;

        return view('sections.show', compact('section', 'groups'));
    }

    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'section_code' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        $section->update($request->all());

        return redirect()->route('sections.index')->with('success', 'Section updated successfully!');
    }
}
