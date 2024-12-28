<?php ob_start();?>

<p class="movieCount">Il y a <?=$requete->rowCount()?> films</p>

<table class="movieTable">
    <thead>
        <tr>
            <th>Comedian</th>
            <th>Nationality</th>
            <th>Birth date</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $actors){ ?>
                <tr>
                    <td><?=$actors["person_forename"]." ".$actors["person_name"]?></td>
                    <td><?=$actors["nationality"]?></td>
                    <td><?=$actors["birth_date"]?></td>
                    <td><?=$actors["gender"]?></td>
                    <td><?=$actors["poster"]?></td>
                </tr>
           <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";