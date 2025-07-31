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

    function image (Request $request){
      $dificuldade = $request ->dificuldade;
      $tentativas = $request ->attempts ?? 0;

      $caminho = storage_path("app/public/IMAGE.png");
      if (!file_exists($caminho)){
        abort(404,"image não encontrada.");
      }
      echo "Deu certo";
    }
}
