<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AccoutClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const DOT = '.';
    const OBJECT = 'client.my-account';
    const OBJECT_USER = 'client.layouts.header';

    public function index()
    {
        $user = auth()->user();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('user'));
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
        $profile = User::find($id);
        $certificates = Certificate::with('user')->with('course')->where('userID', auth()->user()->id)
            ->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('profile', 'certificates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::query()->findOrFail($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $id,
                'firstName' => 'required',
                'lastName' => 'required',
                'username' => 'required|unique:users,username,' . $id,
                'phone' => 'required|regex:/^\d{10}$/',
                'birthday' => 'required|date|before:today',
            ]);

            $model = User::find($id);

            if (!$model) {
                return response()->json(['message' => 'Không tìm thấy người dùng!'], 404);
            }

            $model->fill($request->except('avatar', 're-password'));

            if ($request->hasFile('avatar')) {
                if (!strpos($model->avatar, "default")) {
                    delete_file($model->avatar);
                }
                $model->avatar = upload_file(OBJECT_USER, $request->file('avatar'));
            }

            $model->save();

            return redirect()->route('account.show', auth() -> id());

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
        //
    }
}
