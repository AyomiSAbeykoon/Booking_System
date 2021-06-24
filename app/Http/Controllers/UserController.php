<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Users as UsersResource;

class UserController extends Controller
{
    /**login function */
    public function index(Request $request )
    {
        $user=User::where('email', $request->email)->first();
        if(!$user || !Hash :: check ($request->password, $user->password)){
            return response([
                'message'=>['These credentials do not match our records']
            ],404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response, 201);
        }

     //User Resistration
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user=new user();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');

        $user->save();
    }

    //Reset password
    public function update(Request $request, $id)
    {
        $user= user::findOrFail($id);

        $user->password=$request->input('password');

        $user->save();
       
    }
}
