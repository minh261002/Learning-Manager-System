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

    public function section()
    {
        return $this->hasMany(CourseSection::class);
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
        return Course::orderBy('id', 'desc')->paginate(10);
    }

    public function getPaginate($perPage)
    {
        return Course::orderBy('id', 'desc')->paginate($perPage);
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
