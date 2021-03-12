<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suppport\Facades;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Response;
use Auth;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Response::json($users);
    }

    public function user(Request $request)
    {
        $user = User::find($request->user()->id);
        if($user){
            return Response::json($user);
        }else {
            return response('Token invalido', 500);
        }

    }

    public function signup(UserRegisterRequest $request)
    {
        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        $token = $user->createToken('token', [$request->role]);
        $rol = new Role([
            'role_name' => $request->role,
            'user_id' => $token->token->user_id
        ]);
        $rol->save();
        return Response::json([
            'token' => $token->accessToken,
            'scopes' => $token->token->scopes,
            'Message' => 'created succesfully'
        ]);
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
         {

            $user = Auth::user();
           // echo "hola"; die;
            $userRole = Role::where(['user_id' => $user->id])->first();

            if ($userRole) {
                $this->scope = $userRole->role_name;
            }
            $token = $user->createToken('token', [$this->scope]);
            return response()->json([
                'token' => $token->accessToken,
                'scopes' => $token->token->scopes
            ]);
        } else {
            return Response::json([
                'code' => 400,
                'message' => "The password is incorrect"
            ]);
        }
    }
}
