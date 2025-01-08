<?php ob_start();?>


        <?php
foreach($requete->fetchAll() as $director) { ?>
    <div class="actor">
        <?= $director["person_fullname"]?>
        <?= $director["gender"]?>
        <?= $director["birth_date"]?>
    </div>
    <?php } ?>
    <?php
foreach($DirectorMovieInfo->fetchAll() as $movie) { ?>
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

$titre = "Infos Realisateur";
$titre_secondaire = "Infos Realisateur";
$contenu = ob_get_clean();
require "view/template.php";

