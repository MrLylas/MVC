<?php ob_start();?>



<?php
    foreach($requete->fetchAll() as $movie){ ?>
        <tr>
            <td><?=$movie["movie_poster"]?></td>
            <td><?=$movie["movie_name"]?></td>
            <td><?=$movie["release_date"]?></td>
            <td><?=$movie["rating"]?></td>
        </tr>
<?php } ?>


<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";