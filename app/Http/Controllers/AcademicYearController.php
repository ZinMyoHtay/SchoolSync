<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicYearController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $query = AcademicYear::with('classrooms');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('year_name', 'like', '%' . $search . '%')
                    ->orWhere('start_date', 'like', '%' . $search . '%')
                    ->orWhere('end_date', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $academicYears = $query
            ->orderBy('academic_year_id', 'desc')
            ->get();

        return view(
            'admin.academic.academic-years.index',
            compact('academicYears')
        );
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.academic.academic-years.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'year_name' => [
                'required',
                'regex:/^\d{4}-\d{4}$/',
            ],
            'start_date' => [
                'required',
                'date',
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
        ], [
            'year_name.regex' =>
                'Academic Year Name must use the format YYYY-YYYY, for example 2025-2026.',
        ]);

        [$startYear, $endYear] = array_map(
            'intval',
            explode('-', $validated['year_name'])
        );

        if ($endYear <= $startYear) {
            return back()
                ->withErrors([
                    'year_name' =>
                        'The ending year must be greater than the starting year.',
                ])
                ->withInput();
        }

        $startDate = strtotime($validated['start_date']);
        $endDate = strtotime($validated['end_date']);

        if ((int) date('Y', $startDate) !== $startYear) {
            return back()
                ->withErrors([
                    'start_date' =>
                        "Start Date must be within {$startYear}.",
                ])
                ->withInput();
        }

        if ((int) date('Y', $endDate) !== $endYear) {
            return back()
                ->withErrors([
                    'end_date' =>
                        "End Date must be within {$endYear}.",
                ])
                ->withInput();
        }

        $exists = AcademicYear::where(
            'year_name',
            $validated['year_name']
        )->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'year_name' =>
                        'This Academic Year already exists.',
                ])
                ->withInput();
        }

        AcademicYear::create([
            'year_name' => $validated['year_name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'status' => 'active',
        ]);

        return redirect()
            ->route('admin.academic-years.index')
            ->with('success', 'Academic year created successfully.');
    }

    public function show(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $academicYear = AcademicYear::with('classrooms')
            ->findOrFail($id);

        return view(
            'admin.academic.academic-years.show',
            compact('academicYear')
        );
    }

    public function edit(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $academicYear = AcademicYear::findOrFail($id);

        return view(
            'admin.academic.academic-years.edit',
            compact('academicYear')
        );
    }

    public function update(Request $request, string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $academicYear = AcademicYear::findOrFail($id);

        $validated = $request->validate([
            'year_name' => [
                'required',
                'regex:/^\d{4}-\d{4}$/',
            ],
            'start_date' => [
                'required',
                'date',
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
        ], [
            'year_name.regex' =>
                'Academic Year Name must use the format YYYY-YYYY, for example 2025-2026.',
        ]);

        [$startYear, $endYear] = array_map(
            'intval',
            explode('-', $validated['year_name'])
        );

        if ($endYear <= $startYear) {
            return back()
                ->withErrors([
                    'year_name' =>
                        'The ending year must be greater than the starting year.',
                ])
                ->withInput();
        }

        $startDate = strtotime($validated['start_date']);
        $endDate = strtotime($validated['end_date']);

        if ((int) date('Y', $startDate) !== $startYear) {
            return back()
                ->withErrors([
                    'start_date' =>
                        "Start Date must be within {$startYear}.",
                ])
                ->withInput();
        }

        if ((int) date('Y', $endDate) !== $endYear) {
            return back()
                ->withErrors([
                    'end_date' =>
                        "End Date must be within {$endYear}.",
                ])
                ->withInput();
        }

        $exists = AcademicYear::where(
            'year_name',
            $validated['year_name']
        )
            ->where(
                'academic_year_id',
                '!=',
                $academicYear->academic_year_id
            )
            ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'year_name' =>
                        'This Academic Year already exists.',
                ])
                ->withInput();
        }

        $academicYear->update([
            'year_name' => $validated['year_name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect()
            ->route('admin.academic-years.index')
            ->with('success', 'Academic year updated successfully.');
    }

    public function toggleStatus(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $academicYear = AcademicYear::findOrFail($id);

        if ($academicYear->status === 'active') {
            $academicYear->update([
                'status' => 'inactive'
            ]);

            $message = 'Academic year deactivated successfully.';
        } else {
            $academicYear->update([
                'status' => 'active'
            ]);

            $message = 'Academic year activated successfully.';
        }

        return redirect()
            ->route('admin.academic-years.index')
            ->with('success', $message);
    }
}

