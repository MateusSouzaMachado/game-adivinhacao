<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassicController extends Controller
{
    //php artisan make:controller ClassicController
    function index(string $dificuldade){
      return view("classic/index",[
        "dificuldade"=> $dificuldade
      ]);
    }
}
