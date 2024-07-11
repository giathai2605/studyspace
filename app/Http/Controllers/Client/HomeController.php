<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $countUser = User::query()->count();
        $countUserActive = User::query()->where('userStatusID', 1)->count();
        $countCourse = Courses::query()->where('CourseStatus', 1)->count();
        $countCategory = Category::query()->count();
        $countCertificate = Certificate::query()->count();
        $courses = Courses::query()->with('user')
            ->where('CourseStatus', 1)
            ->orderBy('RegisterCount', 'desc')
            ->paginate(6);
        $categories = Category::query()->get();

        return view('newclient.home.index', compact('user', 'courses', 'countUser', 'countUserActive', 'countCourse', 'countCategory', 'countCertificate', 'categories'));
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
