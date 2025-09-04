<?php

use App\Models\Tecnologia;
use Illuminate\Http\Request;

class ProcessamentoImagem{

    public function processamento(Request $request){

        $dificuldade = $request ->dificuldade;
        $tentativas = $request ->attempts ?? 0;
        $imageId = $request->tecnologia;
        $tecnologia = Tecnologia::find($imageId);
        $caminho = storage_path("app/public/" . $tecnologia->caminho_logo);
    }
}