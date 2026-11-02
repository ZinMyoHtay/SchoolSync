<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $role = Auth::user()->role;

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($role === 'admin') {

            $query = Announcement::with('creator');

            /*
            | Search
            */

            if ($request->filled('search')) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'title',
                        'like',
                        '%' . $search . '%'
                    );

                    $q->orWhere(
                        'content',
                        'like',
                        '%' . $search . '%'
                    );

                });
            }

            /*
            | Date Filter
            */

            if ($request->filled('date')) {

                $query->whereDate(
                    'created_at',
                    $request->date
                );
            }

            /*
            | Get Announcements
            */

            $announcements = $query
                ->orderBy(
                    'announcement_id',
                    'desc'
                )
                ->get();

            return view(
                'admin.announcements.index',
                compact('announcements')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | TEACHER
        |--------------------------------------------------------------------------
        */

        if ($role === 'teacher') {

            $announcements = Announcement::where(
                'status',
                'active'
            )
                ->orderBy(
                    'announcement_id',
                    'desc'
                )
                ->get();

            return view(
                'teacher.teaching.announcements.index',
                compact('announcements')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | STUDENT
        |--------------------------------------------------------------------------
        */

        if ($role === 'student') {

            $announcements = Announcement::where(
                'status',
                'active'
            )
                ->orderBy(
                    'announcement_id',
                    'desc'
                )
                ->get();

            return view(
                'student.school.announcements.index',
                compact('announcements')
            );
        }

        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        return view(
            'admin.announcements.create'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'required',
                'string',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],

        ]);

        Announcement::create([

            'title' => $validated['title'],

            'content' => $validated['content'],

            'created_by' => Auth::user()->user_id,

            'status' => $validated['status'],

        ]);

        return redirect()
            ->route('admin.announcements.index')
            ->with(
                'success',
                'Announcement created successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW - ADMIN
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $announcement = Announcement::with('creator')
            ->findOrFail($id);

        return view(
            'admin.announcements.show',
            compact('announcement')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $announcement = Announcement::findOrFail($id);

        return view(
            'admin.announcements.edit',
            compact('announcement')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        string $id
    ) {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $announcement = Announcement::findOrFail($id);

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'content' => [
                'required',
                'string',
            ],

            'status' => [
                'required',
                'in:active,inactive',
            ],

        ]);

        $announcement->update([

            'title' => $validated['title'],

            'content' => $validated['content'],

            'status' => $validated['status'],

        ]);

        return redirect()
            ->route('admin.announcements.index')
            ->with(
                'success',
                'Announcement updated successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'admin'
        ) {
            abort(403);
        }

        $announcement = Announcement::findOrFail($id);

        $announcement->delete();

        return redirect()
            ->route('admin.announcements.index')
            ->with(
                'success',
                'Announcement deleted successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | TEACHER SHOW
    |--------------------------------------------------------------------------
    */

    public function teacherShow(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'teacher'
        ) {
            abort(403);
        }

        $announcement = Announcement::where(
            'status',
            'active'
        )->findOrFail($id);

        return view(
            'teacher.teaching.announcements.show',
            compact('announcement')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STUDENT SHOW
    |--------------------------------------------------------------------------
    */

    public function studentShow(string $id)
    {
        if (
            !Auth::check() ||
            Auth::user()->role !== 'student'
        ) {
            abort(403);
        }

        $announcement = Announcement::where(
            'status',
            'active'
        )->findOrFail($id);

        return view(
            'student.school.announcements.show',
            compact('announcement')
        );
    }
}