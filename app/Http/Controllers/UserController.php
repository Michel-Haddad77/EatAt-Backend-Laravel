<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //sign up
    public function signUp(Request $request){
        //check if the entered email is already in the db
        $entered_email = $request->email;
        $existing_user = User::where('email',$entered_email)->get();

        //if the added email exists
        if(count($existing_user) !== 0){
            return response()->json([
                "status" => "Email already exists"
            ], 200);
        }

        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 0;
        $user->save();
        
        return response()->json([
            "status" => "Success",
        ], 200);
        
    }

    //Login
    public function login(Request $request){
        //get the entered email from database
        $entered_email = $request->email;
        $matched_user = User::where('email',$entered_email)->first();
    
        $entered_password = $request->password;

        //if email doesn't exist in db
        if (!$matched_user){
            return response()->json([
                "status" => "Email Doesn't exist",
            ], 200);
        }

        //if the password matches the password in db
        if (Hash::check($entered_password, $matched_user->password)){
            return response()->json([
                "status" => "Success",
            ], 200);
        }

        return response()->json([
            "status" => "Email and/or password are incorrect",
        ], 200);
    }

    //get a single user by id
    public function getUserById($id){
        $user = User::find($id);
        
        return response()->json([
            "status" => "Success",
            "results" => $user
        ], 200);
    }

    //Get all users
    public function getAllUsers(){
        $users = User::all();
        
        return response()->json([
            "status" => "Success",
            "results" => $users
        ], 200);
    }
}
