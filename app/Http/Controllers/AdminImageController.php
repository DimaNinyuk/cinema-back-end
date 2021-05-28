<?php

namespace App\Http\Controllers;

use App\ActorFilm;
use Illuminate\Http\Request;
use App\Film;
use App\Image;
use App\ProducerFilm;

class AdminImageController extends Controller
{
    public function upload(Request $request)
    {
        $uploaddir =public_path() .'/img/film';
        $namefile = time().rand(0,1000000).'_'.basename($_FILES['file']['name']);
        $uploadfile = $uploaddir .'/'. $namefile;
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
        $image=Image::create([
            'img' => $namefile,
        ]);
        return response()->json($image, 201);
    }
}
