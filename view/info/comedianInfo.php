<?php ob_start();?>


<table class="movieTable">

    <tbody>
        <?php
foreach($requete->fetchAll() as $actor) { ?>
    <div class="actor">
        <?= $actor["person_fullname"]?>
        <?= $actor["gender"]?>
        <?= $actor["birth_date"]?>
    </div>
<?php } ?>
    </tbody>
</table>

<?php

$titre = "Infos Acteurs";
$titre_secondaire = "Infos Acteurs";
$contenu = ob_get_clean();
require "view/template.php";

