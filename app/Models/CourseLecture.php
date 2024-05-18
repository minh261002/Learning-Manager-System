<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLecture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAllLectures()
    {
        return $this->all();
    }

    public function section()
    {
        return $this->belongsTo(CourseSection::class);
    }

    public function getTotalDuration($sectionId)
    {
        return $this->where('section_id', $sectionId)->sum('duration');
    }
}
