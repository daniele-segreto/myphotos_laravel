<?php

namespace App\Http\Controllers\Api;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all(); // carica tutte le foto del database

        return response()->json($photos); // le restituisce in formato json
    }
}
