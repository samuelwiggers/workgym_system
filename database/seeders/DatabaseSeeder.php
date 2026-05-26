<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\Plan;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $mensal = Plan::create([
            'name' => 'Mensal',
            'price' => 99.90,
            'duration_months' => 1,
        ]);

        $trimestral = Plan::create([
            'name' => 'Trimestral',
            'price' => 249.90,
            'duration_months' => 3,
        ]);

        $instructor = Instructor::create([
            'name' => 'Carlos Silva',
            'email' => 'carlos@academia.com',
            'phone' => '11999990000',
        ]);

        $lesson = Lesson::create([
            'name' => 'Musculação',
            'instructor_id' => $instructor->id,
            'weekday' => 'Segunda',
            'time' => '08:00',
            'capacity' => 15,
        ]);

        $ana = Student::create([
            'name' => 'Ana Souza',
            'email' => 'ana@email.com',
            'phone' => '11988887777',
        ]);

        $joao = Student::create([
            'name' => 'João Lima',
            'email' => 'joao@email.com',
        ]);

        Enrollment::create([
            'student_id' => $ana->id,
            'plan_id' => $mensal->id,
            'lesson_id' => $lesson->id,
            'start_date' => '2026-05-01',
            'end_date' => '2026-05-31',
        ]);

        Enrollment::create([
            'student_id' => $joao->id,
            'plan_id' => $trimestral->id,
            'lesson_id' => null,
            'start_date' => '2026-05-01',
        ]);
    }
}
