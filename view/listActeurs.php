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
<a href="http://mvc.test/index.php?action=addComedianForm">
    <div class="btnAdd">Add Comedian</div>
</a>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";