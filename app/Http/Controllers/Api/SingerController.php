<?php

namespace App\Http\Controllers\Api;

use App\Singer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function index() {
        return Singer::all();
    }
}
