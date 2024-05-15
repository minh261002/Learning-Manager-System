<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getAllCourses()
    {
        return Course::orderBy('id', 'desc')->get();
    }

    public function getCourseBySlug($slug)
    {
        return Course::where('slug', $slug)->first();
    }

    public function getCourseByInstructor($instructorId)
    {
        return Course::where('instructor_id', $instructorId)->get();
    }
}
