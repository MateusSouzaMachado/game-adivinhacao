<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATSUM</title>
    @vite("resources/css/classic/index.css")
    @vite("resources/js/classic/index.js")
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
</head>
<body style="background-color: #303F9F">
    <div class="container">
        <div class="row">
            <h1 class="game-name">ATSUM</h1>
            <h2 class="game-difficulty">{{$dificuldade}}</h2>
            <img src="{{'classic.image'}}" alt="Imagem do Jogo">
        </div>
    </div>
</body>
</html>