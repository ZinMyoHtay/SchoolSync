<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('user_id', 'like', '%' . $search . '%');
            });
        }
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query
            ->orderBy('user_id', 'desc')
            ->get();

        return view('admin.people.users.index', compact('users'));
    }

    public function create()
    {
        $currentUser = Auth::user();
        if (! in_array($currentUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        $departments = \App\Models\Department::orderBy('department_name')->get();

        return view(
            'admin.people.users.create',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $currentUser = Auth::user();

        if (! in_array($currentUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        $allowedRoles = $currentUser->role === 'admin' ? ['admin', 'staff', 'teacher', 'student'] : ['teacher', 'student'];

        $validated = $request->validate([

            'name'     => [
                'required',
                'string',
                'max:255',
            ],

            'email'    => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'role'     => [
                'required',
                Rule::in($allowedRoles),
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

        ]);

        if (in_array($validated['role'], ['staff', 'teacher'])) {

            $request->validate([

                'dept_id'   => [
                    'required',
                    'exists:departments,department_id',
                ],

                'phone'     => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'address'   => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'hire_date' => [
                    'required',
                    'date',
                ],

                'position'  => [
                    'required',
                    'string',
                    'max:255',
                ],

            ]);
        }

        if ($validated['role'] === 'teacher') {

            $request->validate([

                'specialization' => [
                    'required',
                    'string',
                    'max:255',
                ],

            ]);
        }

        if ($validated['role'] === 'student') {

            $request->validate([

                'date_of_birth'       => [
                    'nullable',
                    'date',
                ],

                'student_phone'       => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'student_address'     => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'admission_date'      => [
                    'required',
                    'date',
                ],

                'parent_name'         => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'parent_phone'        => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'parent_email'        => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'parent_address'      => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'parent_relationship' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

            ]);
        }

        DB::transaction(function () use ($validated, $request) {

            $user = User::create([

                'name'     => $validated['name'],

                'email'    => $validated['email'],

                'role'     => $validated['role'],

                'password' => $validated['password'],

            ]);

            if ($validated['role'] === 'staff') {

                Staff::create([

                    'user_id'    => $user->user_id,

                    'dept_id'    => $request->dept_id,

                    'staff_code' => $this->generateStaffCode(),

                    'full_name'  => $validated['name'],

                    'phone'      => $request->phone,

                    'address'    => $request->address,

                    'hire_date'  => $request->hire_date,

                    'position'   => $request->position,

                ]);
            }

            if ($validated['role'] === 'teacher') {

                $staff = Staff::create([

                    'user_id'    => $user->user_id,

                    'dept_id'    => $request->dept_id,

                    'staff_code' => $this->generateStaffCode(),

                    'full_name'  => $validated['name'],

                    'phone'      => $request->phone,

                    'address'    => $request->address,

                    'hire_date'  => $request->hire_date,

                    'position'   => $request->position,

                ]);

                Teacher::create([

                    'staff_id'       => $staff->staff_id,

                    'teacher_code'   => $this->generateTeacherCode(),

                    'specialization' => $request->specialization,

                ]);
            }

            if ($validated['role'] === 'student') {

                Student::create([

                    'user_id'             => $user->user_id,

                    'student_code'        => $this->generateStudentCode(),

                    'full_name'           => $validated['name'],

                    'date_of_birth'       => $request->date_of_birth,

                    'phone'               => $request->student_phone,

                    'address'             => $request->student_address,

                    'admission_date'      => $request->admission_date,

                    'parent_name'         => $request->parent_name,

                    'parent_phone'        => $request->parent_phone,

                    'parent_email'        => $request->parent_email,

                    'parent_address'      => $request->parent_address,

                    'parent_relationship' => $request->parent_relationship,

                ]);
            }

        });

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User account created successfully.'
            );
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.people.users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $departments = Department::orderBy('department_name')->get();

        $staff   = null;
        $teacher = null;
        $student = null;

        if (in_array($user->role, ['staff', 'teacher'])) {

            $staff = Staff::where('user_id', $user->user_id)->first();
        }

        if ($user->role === 'teacher' && $staff) {

            $teacher = Teacher::where(
                'staff_id',
                $staff->staff_id
            )->first();
        }

        if ($user->role === 'student') {

            $student = Student::where(
                'user_id',
                $user->user_id
            )->first();
        }

        return view(
            'admin.people.users.edit',
            compact(
                'user',
                'departments',
                'staff',
                'teacher',
                'student'
            )
        );
    }

  public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],

        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')
                ->ignore($user->user_id, 'user_id'),
        ],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Update User
    |--------------------------------------------------------------------------
    */

    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Update Staff / Teacher Information
    |--------------------------------------------------------------------------
    */

    if (in_array($user->role, ['staff', 'teacher'])) {

        $staff = Staff::where('user_id', $user->user_id)->first();

        if ($staff) {

            $staff->update([
                'dept_id' => $request->dept_id,
                'full_name' => $validated['name'],
                'phone' => $request->phone,
                'address' => $request->address,
                'hire_date' => $request->hire_date,
                'position' => $request->position,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Teacher Information
            |--------------------------------------------------------------------------
            */

            if ($user->role === 'teacher') {

                $teacher = Teacher::where(
                    'staff_id',
                    $staff->staff_id
                )->first();

                if ($teacher) {

                    $teacher->update([
                        'specialization' => $request->specialization,
                    ]);

                }
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Student Information
    |--------------------------------------------------------------------------
    */

    if ($user->role === 'student') {

        $student = Student::where(
            'user_id',
            $user->user_id
        )->first();

        if ($student) {

            $student->update([
                'full_name' => $validated['name'],
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->student_phone,
                'address' => $request->student_address,
                'admission_date' => $request->admission_date,
                'parent_name' => $request->parent_name,
                'parent_phone' => $request->parent_phone,
                'parent_email' => $request->parent_email,
                'parent_address' => $request->parent_address,
                'parent_relationship' => $request->parent_relationship,
            ]);

        }
    }

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'User updated successfully.');
}
    public function toggleStatus(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->status === 'active') {
            $user->update([
                'status' => 'inactive',
            ]);

            $message = 'User account deactivated successfully.';
        } else {
            $user->update([
                'status' => 'active',
            ]);

            $message = 'User account activated successfully.';
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', $message);
    }

    private function generateStaffCode()
    {
        $lastStaff = Staff::orderBy('staff_id', 'desc')->first();

        $nextNumber = $lastStaff ? $lastStaff->staff_id + 1 : 1;

        return 'STF-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    private function generateTeacherCode()
    {
        $lastTeacher = Teacher::orderBy('teacher_id', 'desc')->first();

        $nextNumber = $lastTeacher ? $lastTeacher->teacher_id + 1 : 1;

        return 'TCH-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    private function generateStudentCode()
    {
        $lastStudent = Student::orderBy('student_id', 'desc')->first();

        $nextNumber = $lastStudent ? $lastStudent->student_id + 1 : 1;

        return 'STU-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

}
