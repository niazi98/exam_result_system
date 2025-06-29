<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'exam_date', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
