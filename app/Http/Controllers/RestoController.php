<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Add the model
use App\Models\Restaurant;

class RestoController extends Controller
{
    //Add a restaurant (post)
    public function addResto(Request $request){
        //check if the entered name is already in the db
        $entered_name = $request->name;
        $resto = Restaurant::where('name',$entered_name)->get();

        //if the added name exists
        if(count($resto) !== 0){
            return response()->json([
                "status" => "Name already exists"
            ], 200);

        }

        $resto = new Restaurant;
        $resto->name = $request->name;
        $resto->location = $request->location;
        $resto->avg_cost = $request->avg_cost;
        $resto->category = $request->category;
        $resto->description = $request->description;
        $resto->save();
        
        return response()->json([
            "status" => "Success",
            "resto" => $resto
        ], 200);
        
    }

    //Get all restaurants
    public function getAllRestos(){
        $restos = Restaurant::all();
        
        return response()->json([
            "status" => "Success",
            "results" => $restos
        ], 200);
    }

    //get a single restaurant by id
    public function getRestoById($id){
        $resto = Restaurant::find($id);
        
        return response()->json([
            "status" => "Success",
            "results" => $resto
        ], 200);
    }


}
