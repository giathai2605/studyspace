<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.category';

    public function __construct()
    {
        $this->middleware('permission:category.index', ['only' => ['index']]);
        $this->middleware('permission:category.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:category.show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::OBJECT . self::DOT . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        $request->merge(['slug' => $slug]);
        $data = $request->except('_token');
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);
            if (Category::where('name', $request->name)->exists()) {
                $err = 'Danh mục đã tồn tại!';
                return response()->json(['message' => $err], 422);
            }
            Category::create($data);
            return redirect()->route('category.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $courses = $category->courses()->paginate(10);

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('category', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slug = Str::slug($request->name, '-');
        $request->merge(['slug' => $slug]);
        $data = $request->except('_token');
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);
            if (Category::where('name', $request->name)->where('id', '!=', $id)->exists()) {
                $err = 'Danh mục đã tồn tại!';
                return response()->json(['message' => $err], 422);
            }
            $category = Category::findOrFail($id);
            if (!$category) {
                return response()->json(['message' => 'Danh mục không tồn tại!'], 404);
            }
            $category->update($data);
            return redirect()->route('category.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()->route('category.index');
        } else {
            return response()->json(['message' => 'Danh mục không tồn tại!'], 404);
        }
    }
}
