<?php

namespace App\Http\Controllers;
use App\Models\Tecnologia;
use Illuminate\Http\Request;

class ClassicController extends Controller
{
    //php artisan make:controller ClassicController
    function index(string $dificuldade){
     $tecnologias = Tecnologia::all();

     $random =rand(0, $tecnologias->count() -1);
     $primeiraTecnologia = $tecnologias
     ->skip($random)->take(1);

     return view ("classic/index",[
      "dificuldade" => $dificuldade,
      "tecnologias" => $tecnologias,
      "tecnologia" => $primeiraTecnologia->first()->id
     ]);
    }

    function image (Request $request){
      $dificuldade = $request ->dificuldade;
      $tentativas = $request ->attempts ?? 0;
      $imageId = $request->tecnologia;

      $tecnologia = Tecnologia::find($imagemId);

      $caminho = storage_path("app/public/" . $tecnologia->caminho_logo);
      if (!file_exists($caminho)){
        abort(404,"image não encontrada.");
      }

      $extenso = strtolower(
        pathinfo(
          $caminho,
          PATHINFO_EXTENSION
        ));

      if(!in_array($extenso, ['jpg','png','jpeg'])){
        abort(415, "Formato de imagen não suportado.");
      }

      $imagemOriginal = match ($extenso){
        'png' => imagecreatefrompng($caminho),
        default => imagecreatefromjpeg($caminho),
      };

      //PIXELIZAÇÃO - NIVEL 1
      $largura = imagesx($imagemOriginal);
      $altura = imagesy($imagemOriginal);

      $fatorPixelização = ((5 + $tentativas) /100) - 0.002;

      $novaLargura = max(1, intval($largura * $fatorPixelização));
      $novaAltura = max(1,intval($altura * $fatorPixelização));

      $imagemPequena = imagecreatetruecolor($novaLargura, $novaAltura);
      imagecopyresized(
        $imagemPequena,
        $imagemOriginal,
        0,0,0,0,
        $novaLargura,
        $novaAltura,
        $largura,
        $altura
      );
      $imagemFinal = imagecreatetruecolor($largura,$altura);
      imagecopyresized(
        $imagemFinal,
        $imagemPequena,
        0,0,0,0,
        $largura,
        $altura,
        $novaAltura,
        $novaLargura
      );

      //RUIDO - NIVEL 2
      $tamanhoRuido = ((5 - $tentativas) * 10) / 2;
      for($i = 0; $i < 500; $i++){
        $x = rand(0, $largura - $tamanhoRuido);
        $y = rand(0, $altura - $tamanhoRuido);
        $cor = imagecolorallocate(
          $imagemFinal,
          rand(0, 255),
          rand(0, 255),
          rand(0, 255)
        );

        imagefilledrectangle(
          $imagemFinal,
          $x,
          $y,
          $x + $tamanhoRuido,
          $y + $tamanhoRuido,
          $cor
        );
      }

      //PRETO E BRANCO - NIVEL 3
      imagefilter($imagemFinal, IMG_FILTER_GRAYSCALE);
    

      ob_start();

      if($extenso === 'png'){
        imagepng($imagemFinal);
        $contentType = "image/png";
      }else{
        imagejpeg($imagemFinal);
        $contentType = "image/jpeg";
      }

      $conteudoImagem = ob_get_clean();
      imagedestroy($imagemFinal);

      $base64 = 'data:' . $contentType . ';base64,' . base64_encode($conteudoImagem);
      return response()->json([
        "image" => $base64,
        'dificuldade'=> 'Teste',
        'resposta'=> 'a',
        'vidas'=> 'a'
      ]);
    }
}
