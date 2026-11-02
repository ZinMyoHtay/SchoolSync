<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the departments.
     */

public function index(Request $request)
{
    $query = Department::with('staff');

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('department_name', 'like', '%' . $search . '%')
                ->orWhere('department_id', 'like', '%' . $search . '%');
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $departments = $query
        ->orderBy('department_id', 'desc')
        ->get();

    return view(
        'admin.people.departments.index',
        compact('departments')
    );
}



    /**
     * Show the form for creating a new department.
     */
    public function create()
    {
        return view('admin.people.departments.create');
    }

    /**
     * Store a newly created department.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => [
                'required',
                'string',
                'max:100',
                'unique:departments,department_name',
            ],
        ]);

        Department::create([
            'department_name' => $request->department_name,
            'status' => 'active',
        ]);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified department.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);

        return view(
            'admin.people.departments.show',
            compact('department')
        );
    }

    /**
     * Show the form for editing the specified department.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);

        return view(
            'admin.people.departments.edit',
            compact('department')
        );
    }

    /**
     * Update the specified department.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'department_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('departments', 'department_name')
                    ->ignore(
                        $department->department_id,
                        'department_id'
                    ),
            ],
        ]);

        $department->update([
            'department_name' => $request->department_name,
        ]);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Activate or deactivate the department.
     */
    public function toggleStatus(string $id)
    {
        $department = Department::findOrFail($id);

        if ($department->status === 'active') {
            $department->update([
                'status' => 'inactive',
            ]);

            $message = 'Department deactivated successfully.';
        } else {
            $department->update([
                'status' => 'active',
            ]);

            $message = 'Department activated successfully.';
        }

        return redirect()
            ->route('admin.departments.index')
            ->with('success', $message);
    }
}