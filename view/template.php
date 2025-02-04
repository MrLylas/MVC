<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
    <title><?=$titre?></title>
</head>
<body>
    <nav class="navbar">
        
        <a href="index.php?action=mainPage"><h1>ProntoCine</h1></a>
        <div class="menu">
            <a href="index.php?action=listActeurs"><div class="btnMenu">Actors</div></a>
            <a href="index.php?action=listDirector"><div class="btnMenu">Directors</div></a>
            <a href="index.php?action=addCastingForm"><div class="btnMenu">Add Casting</div></a>
            <a href="index.php?action=listFilms"><div class="btnMenu">Movie</div></a>
            <a href="index.php?action=listCategory"><div class="btnMenu">Categories</div></a>
        </div>
    </nav>

    <h2><?=$titre_secondaire?></h2>
    
        <div id="wrapper">
            <main>
                <div id="contenu">
                    <?=$contenu?>
                </div>
            </main>
        </div>
</body>
</html>