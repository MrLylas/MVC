<?php ob_start();?>

<p class="movieCount">Il y a <?=$requete->rowCount()?> films</p>

<table class="movieTable">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $actors){ ?>
                <tr>
                    <td><?=$actors["person_name"]?></td>
                    <td><?=$actors["person_forename"]?></td>
                </tr>
           <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";