<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class TeacherAnnouncementController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            abort(403);
        }

        $user = Auth::user();

        if ($user->role === 'teacher') {

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
                'teacher.communication.announcements.index',
                compact('announcements')
            );
        }

        if ($user->role === 'student') {

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
                'student.communication.announcements.index',
                compact('announcements')
            );
        }

        abort(403);
    }
}