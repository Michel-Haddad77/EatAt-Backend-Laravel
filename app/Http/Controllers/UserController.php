<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
}
