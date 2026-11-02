
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id('parent_id');
            $table->string('full_name');
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('parent_student', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('student_id');
            $table->string('relationship', 100)->nullable();
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->primary(['parent_id', 'student_id']);

            $table->foreign('parent_id')
                ->references('parent_id')
                ->on('parents')
                ->cascadeOnDelete();

            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->cascadeOnDelete();
        });

       
        $students = DB::table('students')
            ->where(function ($query) {
                $query->whereNotNull('parent_name')
                    ->orWhereNotNull('parent_phone')
                    ->orWhereNotNull('parent_email')
                    ->orWhereNotNull('parent_address')
                    ->orWhereNotNull('parent_relationship');
            })
            ->get();

        foreach ($students as $student) {
            $parentName = trim((string) $student->parent_name);

            if ($parentName === '') {
                $parentName = 'Parent of ' . $student->full_name;
            }

            $now = now();

            $parentId = DB::table('parents')->insertGetId([
                'full_name' => $parentName,
                'phone' => $student->parent_phone,
                'email' => $student->parent_email,
                'address' => $student->parent_address,
                'created_at' => $now,
                'updated_at' => $now,
            ], 'parent_id');

            DB::table('parent_student')->insert([
                'parent_id' => $parentId,
                'student_id' => $student->student_id,
                'relationship' => $student->parent_relationship,
                'is_primary' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('parent_student');
        Schema::dropIfExists('parents');
    }
};
