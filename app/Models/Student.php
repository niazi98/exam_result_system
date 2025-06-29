<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // ✅ Allow mass assignment for these fields
    protected $fillable = [
        'registration_number',
        'name', 
        'email', 
        'department', 
        'gender',
        'student_type'
    ];

    /**
     * Get the student's results
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    /**
     * Get the undergraduate details
     */
    public function undergraduateDetails()
    {
        return $this->hasOne(UndergraduateStudent::class);
    }

    /**
     * Get the graduate details
     */
    public function graduateDetails()
    {
        return $this->hasOne(GraduateStudent::class);
    }

    /**
     * Get the student's transcript
     */
    public function getTranscript()
    {
        return $this->results()->with('course')->get();
    }

    /**
     * Calculate GPA
     */
    public function calculateGPA()
    {
        $results = $this->results;
        if ($results->isEmpty()) {
            return 0.0;
        }

        $totalPoints = 0;
        $totalCredits = 0;

        foreach ($results as $result) {
            $gradePoints = $this->getGradePoints($result->grade);
            $credits = $result->course->credits ?? 3; // Default to 3 credits if not set
            $totalPoints += $gradePoints * $credits;
            $totalCredits += $credits;
        }

        return $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0.0;
    }

    /**
     * Convert grade to grade points
     */
    public function getGradePoints($grade)
    {
        $gradePoints = [
            'A+' => 4.0, 'A' => 4.0, 'A-' => 3.7,
            'B+' => 3.3, 'B' => 3.0, 'B-' => 2.7,
            'C+' => 2.3, 'C' => 2.0, 'C-' => 1.7,
            'D+' => 1.3, 'D' => 1.0, 'F' => 0.0
        ];

        return $gradePoints[strtoupper($grade)] ?? 0.0;
    }
}
