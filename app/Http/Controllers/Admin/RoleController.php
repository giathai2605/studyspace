<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.roles';

    public function __construct()
    {
        $this->middleware('permission:roles.index', ['only' => ['index']]);
        $this->middleware('permission:roles.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:roles.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:roles.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:roles.show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::whereNot('name', 'Supper Admin')->paginate(10);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('roles'));
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
        $data = $request->except('_token');
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);
            $role = new Role();
            $role->fill($data)->save();
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles.index');
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
        $role = Role::query()->findOrFail($id);
        $permissions = $role->permissions->pluck('name')->toArray();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::query()->findOrFail($id);
        $permissions = $role->permissions->pluck('name')->toArray();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);
            $role = Role::find($id);
            if (!$role) {
                return response()->json(['message' => 'Role not found'], 404);
            }
            $role->update($data);
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles.index');
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
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
