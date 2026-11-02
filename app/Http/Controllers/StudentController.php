<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if (!Auth::check()) {
            abort(403);
        }

        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.people.students.index');

            case 'staff':
                return view('staff.people.students.index');

            case 'teacher':
                return view('teacher.teaching.students.index');

            case 'student':
                return view('student.academic.students.index');

            default:
                abort(403);
    }
    
        
        // if (Auth::check() && Auth::user()->role === 'teacher') {
        //     return view('teacher.teaching.students.index');
        // }
       // return view('admin.people.students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
