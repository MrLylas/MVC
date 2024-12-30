<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?=$titre?></title>
</head>
<body>
    <nav class="navbar">
        <h1>PDO Cinema</h1>
        <h2><?=$titre_secondaire?></h2>
        <div class="menu">
            <a href="http://mvc.test/index.php?action=listActeurs"><div class="btnMenu">Acteurs</div></a>
            <a href="http://mvc.test/index.php?action=listDirector"><div class="btnMenu">Directors</div></a>
            <a href="http://mvc.test/index.php?action=listFilms"><div class="btnMenu">Films</div></a>
            <a href="http://mvc.test/index.php?action=listCategory"><div class="btnMenu">Catégories</div></a>
            <a href="http://mvc.test/index.php?action=comedianInfo"><div class="btnMenu">Infos Comédiens</div></a>
            <a href="http://mvc.test/index.php?action=filmInfo"><div class="btnMenu">Infos film</div></a>
        </div>
    </nav><br>
        <div id="wrapper">
            <main>
                <div id="contenu">
                    <?=$contenu?>
                </div>
            </main>
        </div>
</body>
</html>