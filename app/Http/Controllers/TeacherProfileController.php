<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller
{
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        // User → Staff → Teacher
        $staff = $user->staff;

        $teacher = $staff?->teacher;

        return view('teacher.profile.edit', compact(
            'user',
            'teacher'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->password = Hash::make(
            $request->password
        );

        $user->save();

        return redirect()
            ->route('teacher.profile.edit')
            ->with(
                'success',
                'Password updated successfully.'
            );
    }
}

