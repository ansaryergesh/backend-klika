<?php

namespace App\Http\Controllers\Api;

use App\Singer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function index() {
        $singers = Singer::get()->toJson(JSON_PRETTY_PRINT);
        return response($singers, 200);
    }

    public function createSinger(Request $request) {
        $singer = new Singer;
        $singer->name = $request->name;
        $singer->save();
  
        return response()->json([
          "message" => "singer record created"
        ], 201);
    }

    
    public function getSinger($id) {
        if (Singer::where('id', $id)->exists()) {
          $singer = Singer::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($singer, 200);
        } else {
          return response()->json([
            "message" => "singer not found"
          ], 404);
        }
    }

    public function updateSinger(Request $request, $id) {
        if (Singer::where('id', $id)->exists()) {
          $singer = Singer::find($id);
  
          $singer->name = is_null($request->name) ? $singer->name : $request->name;
          $singer->save();
  
          return response()->json([
            "message" => "singer record updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Singer not found"
          ], 404);
        }
      }
  
      public function deleteSinger ($id) {
        if(Singer::where('id', $id)->exists()) {
          $singer = Singer::find($id);
          $singer->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Singer not found"
          ], 404);
        }
    }
}
