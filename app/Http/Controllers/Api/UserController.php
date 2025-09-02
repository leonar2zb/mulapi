<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    //
    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = new User(['email' => $data['email'], 'password' => bcrypt($data['password'])]);
        $user->save();
        if (isset($data['whatsapp']))
            $user->detail()->create(['whatsapp' => $data['whatsapp']]);

        return response()->json([
            'message' => 'Usuario creado'
        ], 201);
    }

    public function user(Request $request)
    {
        $user = $request->user(); // Auth::user();
        if ($user)
            return response()->json([
                'id' => $user->id,
                'email' => $user->email,
                'created_at' => $user->created_at
            ], 200);
        return response()->json(['error' => 'Usuario no válido'], 404);
    }
}
