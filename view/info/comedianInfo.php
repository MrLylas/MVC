<?php ob_start();?>


        <?php
foreach($requete->fetchAll() as $actor) { ?>
    <div class="actor">
        <?= $actor["person_fullname"]?>
        <?= $actor["person_fullname"]?>
        <?= $actor["gender"]?>
        <?= $actor["birth_date"]?>
    </div>
    <?php } ?>
    <?php
foreach($ComedianMovieInfo->fetchAll() as $movie) { ?>
    <div class="movie">
        <?= $movie["movie_poster"]?>
        
        <p><?= $movie["movie_name"]?></p>
        <p><?= $movie["duration"]?> min</p>
        <p><?= $movie["rating"]?>/10</p>
        <p><?= $movie["release_date"]?></p><br>
    </div>
<?php } ?>
    </tbody>


<?php

$titre = "Infos Acteurs";
$titre_secondaire = "Infos Acteurs";
$contenu = ob_get_clean();
require "view/template.php";

