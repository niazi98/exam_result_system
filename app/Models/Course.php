<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'credits',
        'description',
    ];

    /**
     * Get the results for this course
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    /**
     * Get the students enrolled in this course
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
}
