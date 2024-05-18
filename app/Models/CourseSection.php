<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAllSections()
    {
        return $this->all();
    }

    public function lectures()
    {
        return $this->hasMany(CourseLecture::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}