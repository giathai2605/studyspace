<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class CourseIntroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const OBJECT = 'client';

    public function index(string $id)
    {
        $data = Courses::with('chapters.lessons.practices')
            ->where('id', $id)
            ->first();
          
        if (auth()->user() != null) {
            $userCourse = UserCourse::where('UserID', auth()->user()->id)
                ->where('CourseID', $id)
                ->count();
        } else {
            $userCourse = 0;
        }

        return view('client.course-intro', compact('data', 'userCourse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
