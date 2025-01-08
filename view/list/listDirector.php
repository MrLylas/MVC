<?php ob_start();?>


<?php
    foreach($listDirectors->fetchAll() as $director){ ?>

        <a href="index.php?action=DirectorInfo&id=<?= $director['id_director'] ?>">
            <?=$director["complete_name"]?>
        </a>

<?php } ?>


<a href="index.php?action=addDirectorForm">
    <div class="btnAdd">Add Director</div>
</a>

<?php

$titre = "Liste des Réalisateur";
$titre_secondaire = "Liste des Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";


