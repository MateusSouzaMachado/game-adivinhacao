<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODIZ</title>
    @vite("resources/css/classic/index.css")
    @vite("resources/js/classic/index.js")
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
</head>
<body style="background-color: #303F9F">
    <div id="app" data-dificuldade="{{ $dificuldade }}"></div>
    <div id="image" data-image="{{ $tecnologia }}"></div>

    <div class="container">
        <div class="row">
            <h1 class="game-name">Codiz</h1>
            <h2 class="game-difficulty">{{$dificuldade}}</h2>
        </div>
    </div>

    <img id="guess-image" class="img-portrait" alt="Imagem a ser adivinhada"/>
    <div class="container-vidas">
        <span>☕</span>
        <span>☕</span>
        <span>☕</span>
        <span>☕</span>
        <span>☕</span>
    </div>
    <div class="select">
    <select id ="tecnologia-select">
        @foreach ($tecnologias as $tec)
            <option value="{{ $tec->codigo }}">{{ $tec->nome }}</option>
        @endforeach    
    </select>
    </div>
    <button id="guess-button" class="button">ADIVINHAR</button>
</body>
</html>