<?php

namespace App\Http\Controllers\Api;

use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::get()->toJson(JSON_PRETTY_PRINT);
        return response($genres, 200);
    }

    public function createGenre(Request $request) {
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();
  
        return response()->json([
          "message" => "genre record created"
        ], 201);
    }

    
    public function getGenre($id) {
        if (Genre::where('id', $id)->exists()) {
          $genre = Genre::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($genre, 200);
        } else {
          return response()->json([
            "message" => "genre not found"
          ], 404);
        }
    }

    public function updateGenre(Request $request, $id) {
        if (Genre::where('id', $id)->exists()) {
          $genre = Genre::find($id);
  
          $genre->name = is_null($request->name) ? $genre->name : $request->name;
          $genre->save();
  
          return response()->json([
            "message" => "genre record updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Genre not found"
          ], 404);
        }
      }
  
      public function deleteGenre ($id) {
        if(Genre::where('id', $id)->exists()) {
          $genre = Genre::find($id);
          $genre->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Genre not found"
          ], 404);
        }
    }
}
