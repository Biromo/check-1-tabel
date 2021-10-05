<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return (new UserResourceCollection($users))->response();
    }
    public function show(User $user)
    {
        return (new UserResource($user))->response();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|max:255|email|unique:users,email',
            'password' => 'bail|required|string|min:8'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        Log::info("User ID {$user->id} created successfully.");
        return (new UserResource($user))->response()->setStatusCode(Response::HTTP_CREATED);
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|max:255|email|unique:users,email,'.$user->id
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        Log::info("User ID {$user->id} updated successfully.");
        return (new UserResource($user))->response();
    }
    public function destroy(User $user)
    {
        $user->delete();
        Log::info("User ID {$user->id} deleted successfully.");
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
