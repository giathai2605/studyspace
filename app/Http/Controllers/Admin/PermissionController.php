<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.permissions';

    public function __construct()
    {
        $this->middleware('permission:permissions.index', ['only' => ['index']]);
        $this->middleware('permission:permissions.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permissions.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permissions.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:permissions.show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        $config = config('permissions');

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('permissions', 'config'));
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        return view(self::OBJECT . self::DOT . __FUNCTION__);
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        $data = $request->except('_token');
//        try {
//            $request->validate([
//                'name' => 'required|max:255',
//            ]);
//            $newPermission = new Permission();
//            $newPermission->fill($data)->save();
//            return redirect()->route('roles.index');
//        } catch (ValidationException $e) {
//            $errors = $e->validator->errors()->all();
//            return response()->json(['message' => $errors], 422);
//        }
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(string $id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(string $id)
//    {
//        $permission = Permission::query()->findOrFail($id);
//        if ($permission) {
//            return view(self::OBJECT . self::DOT . __FUNCTION__, compact('permission'));
//        }
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, string $id)
//    {
//        $data = $request->except('_token');
//        try {
//            $request->validate([
//                'name' => 'required|max:255',
//            ]);
//            $permission = Permission::find($id);
//            if (!$permission) {
//                return response()->json(['message' => 'Permission not found'], 404);
//            }
//            $permission->update($data);
//            return redirect()->route('permissions.index');
//        } catch (ValidationException $e) {
//            $errors = $e->validator->errors()->all();
//            return response()->json(['message' => $errors], 422);
//        }
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(string $id)
//    {
//        $permission = Permission::findOrFail($id);
//        if ($permission) {
//            $permission->delete();
//            return redirect()->route('permissions.index');
//        }
//    }
}
