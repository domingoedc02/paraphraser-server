<?php

namespace App\Http\Controllers;
use App\Http\Request\UserRequest;
use App\Models\userModel;
use Illuminate\Http\Request;


class userController extends Controller
{
    public function createUser(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'plan' => 'required|string|max:255',
        ]);

        $createUserData = userModel::create($data);

        return response()->json([
            'status' => true,
            'message' => 'user registered successfully',
            'data' => $createUserData,
        ], 201);
    }

    public function User(Request $request){

        $userData = userModel::all();

        return response()->json([
            'status' => true,
            'message' => 'user retrieve',
            'data' => $userData,
        ], 201);

    }

    public function Details(Request $request, $id){

        $user = userModel::find($id);

        return response()->json([
            'data' => $user,
        ], 201);
    }

    public function UpdateUser(Request $reques, $id){

        $user = userModel::find($id);
        $user->update($request->all());
        return response()->json([
            'updated' => $user,
        ]);
    }
}
