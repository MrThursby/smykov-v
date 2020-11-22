<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School\SchoolCourse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $course = SchoolCourse::find(1);
        $purchased = $course->purchasedBy(2);
        return response()->json($purchased);
    }
}
