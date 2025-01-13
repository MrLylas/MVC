<?php ob_start();?>

<p class="movieCount">Il y a <?=$requete->rowCount()?> films</p>


<?php
    foreach($requete->fetchAll() as $film){ ?>
        <div class="card">
        <img src="public/images/movie/<?php if ($film["movie_poster"]) {echo $film["movie_poster"] ;
                    } else 
                        {echo "placeholder.svg?height=350&width=250";
                    } ?>"> 
        <a href="index.php?action=filmInfo&id=<?= $film['id_movie'] ?>">
            <?=$film["movie_name"]?>
            <?=$film["release_date"]?>
        </a>
        </div>
<?php } ?>

<a href="index.php?action=addMovieForm">
    <div class="btnAdd">Add Movie</div>
</a>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";