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
        ->select('music.id','music.name','year', 'genres.name AS genre_name', 'singers.name AS singer_name')->orderByDesc('music.id')->get()
  ;

        return response()->json($musics, 200);;
    }

    public function perpage(int $count) {
        $musics = DB::table('music')
        ->join('singers', 'singers.id', '=', 'music.singer_id')
        ->join('genres', 'genres.id', '=', 'music.genre_id')
        ->select('music.id','music.name','year', 'genres.name AS genre_name', 'singers.name AS singer_name')->orderByDesc('music.id')->paginate($count)
  ;

        return response()->json($musics, 200);
    }
    // public function perpage(int $count) {
    //     // $perpage->$request->input('perpage');
    //     $musics = DB::table('music')
    //     ->join('singers', 'singers.id', '=', 'music.singer_id')
    //     ->join('genres', 'genres.id', '=', 'music.genre_id')
    //     ->select('music.id','music.name','year', 'genres.name AS genre_name', 'singers.name AS singer_name')->orderByDesc('music.id')->paginate($count)
    // ;

    //     return response()->json($musics, 200);
    // }

    public function filter(Request $request) {
        $musics = DB::table('music')
        ->join('singers', 'singers.id', '=', 'music.singer_id')
        ->join('genres', 'genres.id', '=', 'music.genre_id')
        ->select('music.id','music.name','year', 'genres.name AS genre_name', 'singers.name AS singer_name')
        ->where('music.singer_id', $array[0])
        ->where('music.genre_id', $array[1])
        ->where('music.year', $array[2])
        ->orderByDesc('music.id')->paginate(6)
  ;

        return response($musics, 200);
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
