<?php ob_start();?>

<p class="movieCount">Il y a <?=$requete->rowCount()?> films</p>


<?php
    foreach($requete->fetchAll() as $movie){ ?>
        <tr>
            <td><?=$movie["movie_poster"]?></td>
            <td><?=$movie["movie_name"]?></td>
            <td><?=$movie["release_date"]?></td>
            <td><?=$movie["rating"]?></td>
            <td><?=$movie["full_name"]?></td><br>
        </tr>
<?php } ?>


<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";