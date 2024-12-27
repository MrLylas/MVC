<?php ob_start();?>

<form action="index.php?action=addType" method="post">
    <label for="newType">Ajouter une catégorie</label>
    <input type="text" name="typeName" id="newType">
    <input type="submit" name="submit" id="submit">
</form>

<?php

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";




