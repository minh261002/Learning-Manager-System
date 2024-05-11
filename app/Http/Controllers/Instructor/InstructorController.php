<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class InstructorController extends Controller
{
    public $province;
    public function __construct()
    {
        $this->province = new Province();
    }

    public function index()
    {
        return view('instructor.pages.dashboard');
    }

    public function profile()
    {
        $provinces = $this->province->getAll();
        return view('instructor.pages.profile', compact('provinces'));
    }

    public function updateProfile(Request $request)
    {

    }
}