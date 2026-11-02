<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        switch (Auth::user()->role) {

            case 'admin':

                $query = Subject::query();

                if ($request->filled('search')) {
                    $search = $request->search;

                    $query->where(function ($q) use ($search) {
                        $q->where('subject_name', 'like', '%' . $search . '%')
                            ->orWhere('subject_code', 'like', '%' . $search . '%')
                            ->orWhere('subject_id', 'like', '%' . $search . '%');
                    });
                }

                if ($request->filled('status')) {
                    $query->where('status', $request->status);
                }

                $subjects = $query
                    ->orderBy('subject_id', 'desc')
                    ->get();

                return view(
                    'admin.academic.subjects.index',
                    compact('subjects')
                );

            case 'staff':

                $subjects = Subject::where('status', 'active')
                    ->orderBy('subject_id', 'desc')
                    ->get();

                return view(
                    'staff.academic.subjects.index',
                    compact('subjects')
                );

            case 'teacher':

                $subjects = Subject::where('status', 'active')
                    ->orderBy('subject_id', 'desc')
                    ->get();

                return view(
                    'teacher.teaching.subjects.index',
                    compact('subjects')
                );

            case 'student':

                $subjects = Subject::where('status', 'active')
                    ->orderBy('subject_id', 'desc')
                    ->get();

                return view(
                    'student.school.subjects.index',
                    compact('subjects')
                );

            default:
                abort(403);
        }
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $nextSubjectNumber = (Subject::max('subject_id') ?? 0) + 1;

        $subjectCode = 'SUB-' . str_pad(
            $nextSubjectNumber,
            3,
            '0',
            STR_PAD_LEFT
        );

        return view(
            'admin.academic.subjects.create',
            compact('subjectCode')
        );
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'subject_name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $subject = Subject::create([
            'subject_code' => 'TEMP-' . uniqid(),
            'subject_name' => $validated['subject_name'],
            'status' => 'active',
        ]);

        $subject->update([
            'subject_code' => 'SUB-' . str_pad(
                $subject->subject_id,
                3,
                '0',
                STR_PAD_LEFT
            ),
        ]);

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Subject created successfully.');
    }

    public function show(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $subject = Subject::with('classSubjects')
            ->findOrFail($id);

        return view(
            'admin.academic.subjects.show',
            compact('subject')
        );
    }

    public function edit(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $subject = Subject::findOrFail($id);

        return view(
            'admin.academic.subjects.edit',
            compact('subject')
        );
    }

    public function update(Request $request, string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $subject = Subject::findOrFail($id);

        $validated = $request->validate([
            'subject_name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $subject->update([
            'subject_name' => $validated['subject_name'],
        ]);

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    public function toggleStatus(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $subject = Subject::findOrFail($id);

        if ($subject->status === 'active') {
            $subject->update([
                'status' => 'inactive',
            ]);

            $message = 'Subject deactivated successfully.';
        } else {
            $subject->update([
                'status' => 'active',
            ]);

            $message = 'Subject activated successfully.';
        }

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', $message);
    }
}

