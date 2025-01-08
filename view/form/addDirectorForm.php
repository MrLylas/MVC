<?php ob_start();?>

<form action="index.php?action=addDirector" method="post">
    <label for="Name">Director name</label>
    <input type="text" name="DirectorName" id="DirectorName"><br>
    <label for="Forename">Director forename</label>
    <input type="text" name="DirectorForename" id="DirectorForename"><br>
    <label for="Nationality">Director nationality</label>
    <input type="text" name="DirectorNationality" id="DirectorNationality"><br>
    <label for="Birthdate">Director birthdate</label>
    <input type="date" name="DirectorBirthdate" id="DirectorBirthdate"><br>
    <label for="Gender">Director gender</label>
    <input type="text" name="DirectorGender" id="DirectorGender"><br>
    <input type="submit" name="submit" id="submit">
</form>

<?php

$titre = "Director List";
$titre_secondaire = "Director List";
$contenu = ob_get_clean();
require "view/template.php";