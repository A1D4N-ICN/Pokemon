<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Validator;
use Response;

class PokemonController extends Controller
{
    //
    public function index()
    {
        return view('pokemon');
    }
    
    public function get(Request $request)
    {
        $pokemon = Pokemon::orderBy('order', 'asc')->get();
        return response()->json($pokemon);
    }
    
    public function getPokemon(Request $request, $id)
    {
        $pokemon = Pokemon::where('id',$id)->get();
        return response()->json($pokemon);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required|string|max:191',
            'base_experience' => 'required|integer',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'is_default' => 'required|boolean',
            'sprite' => 'required|string|max:191',
            'order' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => "invalid input"])->setStatusCode(400);
        } else {
            $pokemon = Pokemon::create($request->all());
        }
    
        return response()->json($pokemon);
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:191',
            'base_experience' => 'integer',
            'height' => 'integer',
            'weight' => 'integer',
            'is_default' => 'boolean',
            'sprite' => 'string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => "invalid input"])->setStatusCode(400);
        } else {
            $pokemon->update($request->all());
        }


        return response()->json($pokemon);
    }
    
    public function delete($id)
    {
        Pokemon::destroy($id);
    
        return response()->json(["success" => true]);
    }
}
