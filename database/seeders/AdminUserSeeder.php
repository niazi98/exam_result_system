<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use App\Models\Result;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User if not exists
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        // Create Regular User if not exists
        if (!User::where('email', 'user@gmail.com')->exists()) {
            User::create([
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
        }

        // Create Sample Students if not exists
        $students = [
            [
                'registration_number' => '2024001',
                'name' => 'John Doe',
                'email' => 'john.doe@student.edu',
                'department' => 'Computer Science',
                'gender' => 'Male',
                'student_type' => 'undergraduate',
            ],
            [
                'registration_number' => '2024002',
                'name' => 'Jane Smith',
                'email' => 'jane.smith@student.edu',
                'department' => 'Mathematics',
                'gender' => 'Female',
                'student_type' => 'undergraduate',
            ],
            [
                'registration_number' => '2024003',
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@student.edu',
                'department' => 'Physics',
                'gender' => 'Male',
                'student_type' => 'graduate',
            ],
        ];

        foreach ($students as $studentData) {
            if (!Student::where('registration_number', $studentData['registration_number'])->exists()) {
                Student::create($studentData);
            }
        }

        // Create Sample Courses if not exists
        $courses = [
            [
                'name' => 'Introduction to Programming',
                'code' => 'CS101',
                'credits' => 3,
                'description' => 'Basic programming concepts',
            ],
            [
                'name' => 'Data Structures',
                'code' => 'CS201',
                'credits' => 3,
                'description' => 'Advanced data structures',
            ],
            [
                'name' => 'Calculus I',
                'code' => 'MATH101',
                'credits' => 4,
                'description' => 'Differential calculus',
            ],
            [
                'name' => 'Physics I',
                'code' => 'PHY101',
                'credits' => 4,
                'description' => 'Mechanics and thermodynamics',
            ],
        ];

        foreach ($courses as $courseData) {
            if (!Course::where('code', $courseData['code'])->exists()) {
                Course::create($courseData);
            }
        }

        // Create Sample Results if not exists
        $results = [
            ['student_id' => 1, 'course_id' => 1, 'grade' => 'A'],
            ['student_id' => 1, 'course_id' => 2, 'grade' => 'B+'],
            ['student_id' => 2, 'course_id' => 3, 'grade' => 'A-'],
            ['student_id' => 2, 'course_id' => 4, 'grade' => 'B'],
            ['student_id' => 3, 'course_id' => 1, 'grade' => 'A+'],
            ['student_id' => 3, 'course_id' => 4, 'grade' => 'A'],
        ];

        foreach ($results as $resultData) {
            if (!Result::where('student_id', $resultData['student_id'])
                      ->where('course_id', $resultData['course_id'])->exists()) {
                Result::create($resultData);
            }
        }

        $this->command->info('Sample data created successfully!');
        $this->command->info('Admin login: admin@gmail.com / password');
        $this->command->info('User login: user@gmail.com / password');
    }
}
