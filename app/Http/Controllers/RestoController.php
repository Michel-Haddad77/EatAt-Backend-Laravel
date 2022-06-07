<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Add the model
use App\Models\Restaurant;

class RestoController extends Controller
{
    //Add a restaurant (post)
    public function addResto(Request $request){
        $resto = new Restaurant;
        $resto->name = $request->name;
        $resto->location = $request->location;
        $resto->avg_cost = $request->avg_cost;
        $resto->category = $request->category;
        $resto->description = $request->description;
        $resto->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }

}
