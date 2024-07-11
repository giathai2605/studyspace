<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TestCaseImport;
use App\Models\PracticeLessons;
use App\Models\TestCase;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class TestCaseController extends Controller
{
    const OBJECT = "admin.testcase";
    const DOT = ".";

public function __construct()
    {
        $this->middleware('permission:practice.index', ['only' => ['index']]);
        $this->middleware('permission:practice.create', ['only' => ['create', 'store', 'import']]);
        $this->middleware('permission:practice.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:practice.destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */

    public function index(string $id)
    {
        $data = TestCase::query()->where('PracticeLessonID', $id)->get();
        $practice = PracticeLessons::query()->where('id', $id)->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data', 'practice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $practice = PracticeLessons::query()->where('id', $id)->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('practice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'NameFunction' => 'required',
                'Input' => 'required',
                'InputDetail' => 'required',
                'ExpectOutput' => 'required',
                'SortNumber' => 'required'
            ]);

            $model = new TestCase();
            $model->fill($request->all());
            $model->save();
//            return redirect()->route('practice.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }

    public function import(Request $request)
    {
        $PracticeLessonID = $request->input('PracticeLessonID');

        $file = $request->file('excel_file');
        $this->validate($request, [
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new TestCaseImport($PracticeLessonID), $file);
            return redirect()->route('lesson.index')->with('success', 'Data Imported!');
        } catch (Exception $e) {
            return redirect()->route('lesson.index')->with('error', 'Error importing data: ');
        }
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
        $practice = PracticeLessons::query()->where('id', $id)->get();
        $model = TestCase::query()->findOrFail($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('model', 'practice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'NameFunction' => 'required',
                'Input' => 'required',
                'InputDetail' => 'required',
                'ExpectOutput' => 'required',
                'SortNumber' => 'required'
            ]);

            $model = TestCase::find($id);

            if (!$model) {
                return response()->json(['message' => 'Testcase not found'], 404);
            }

            $model->fill($request->all());
            $model->save();

//            return redirect()->route('users.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $model = TestCase::query()->findOrFail($id);
            $model->delete();
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }
}
