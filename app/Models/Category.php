<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // public function getAllCategories($order, $direction, $searchQuery)
    // {
    //     $query = Category::query();

    //     if ($searchQuery) {
    //         $query->where('name', 'like', '%' . $searchQuery . '%');
    //     }

    //     return $query->orderBy($order, $direction)->get();
    // }

    public function getAll()
    {
        return Category::all();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getCategoryBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }
    public function children_courses()
    {
        return $this->hasManyThrough(Course::class, Category::class, 'parent_id', 'category_id');
    }

}