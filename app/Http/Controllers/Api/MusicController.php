<?php

namespace App\Http\Controllers\Api;

use App\Music;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index() {
        $musics = DB::table('music')
        ->join('singers', 'singers.id', '=', 'music.singer_id')
        ->join('genres', 'genres.id', '=', 'music.genre_id')
        ->select('music.name','year', 'genres.name AS genre_name', 'singers.name AS singer_name')->get()
        ->toJson(JSON_PRETTY_PRINT);;

        return response($musics, 200);;
    }

    public function createMusic(Request $request) {
        $music = new Music;
        $music->name = $request->name;
        $music->year = $request->year;
        $music->singer_id = $request->singer_id;
        $music->genre_id = $request->genre_id;
        $music->save();
  
        return response()->json([
          "message" => "music record created"
        ], 201);
    }

}
