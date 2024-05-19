<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCartItem($userId)
    {
        return $this->where('user_id', $userId)->with('course')->get();
    }

    public function checkItem($courseId, $userId)
    {
        return $this->where('course_id', $courseId)->where('user_id', $userId)->first();
    }

    public function addToCart($courseId, $userId)
    {
        return $this->create([
            'course_id' => $courseId,
            'user_id' => $userId
        ]);
    }

    public function removeItem($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function removeAllItem($userId)
    {
        return $this->where('user_id', $userId)->delete();
    }
}