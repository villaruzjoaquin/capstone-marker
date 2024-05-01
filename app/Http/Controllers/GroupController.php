<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Section;
use Illuminate\Support\Facades\Log;


class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all(); 
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('groups.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
        ]);

        $group = new Group;
        $group->group_name = $request->group_name;
        $group->section_id = $request->section_id; 
        $group->save();

        return redirect()->route('dashboard')->with('success', 'Group created successfully!');
    }

    public function show(Group $group)
    {
        $students = $group->students;

        return view('groups.show', compact('group', 'students'));
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());
        return redirect()->route('groups.index')->with('success', 'Group updated successfully');
    }

    public function deleteGroupWithStudents($id)
    {
        try {
            $group = Group::with('students')->findOrFail($id);

            // Manually delete each student in the group
            foreach ($group->students as $student) {
                $student->delete();
            }

            // After all students are deleted, delete the group
            $group->delete();

            Log::info('Group with ID ' . $id . ' and all associated students deleted successfully.');
            return response()->json(['message' => 'Group and all associated students deleted successfully']);
        } catch (\Exception $e) {
            Log::error('Failed to delete group with ID ' . $id . ': ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete the group. Please try again.'], 500);
        }
    }

    public function deleteGroup($id)
    {
        try {
            $group = Group::findOrFail($id);
            $group->delete();
            Log::info('Group with ID ' . $id . ' deleted successfully.');
            return response()->json(['message' => 'Group deleted successfully']);
        } catch (\Exception $e) {
            Log::error('Failed to delete group with ID ' . $id . ': ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete the group. Please try again.'], 500);
        }
    }

    public function checkGroupHasStudents($id)
    {
        $group = Group::with('students')->findOrFail($id);
        return response()->json(['hasStudents' => $group->students()->exists()]);
    }


}

