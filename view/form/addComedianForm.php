<?php ob_start();?>

<form action="index.php?action=addComedian" method="post">
    <label for="Name">Comedian name</label>
    <input type="text" name="ComedianName" id="ComedianName"><br>
    <label for="Forename">Comedian forename</label>
    <input type="text" name="ComedianForename" id="ComedianForename"><br>
    <label for="Nationality">Comedian nationality</label>
    <input type="text" name="ComedianNationality" id="ComedianNationality"><br>
    <label for="Birthdate">Comedian birthdate</label>
    <input type="date" name="ComedianBirthdate" id="ComedianBirthdate"><br>
    <label for="Gender">Comedian gender</label>
    <input type="text" name="ComedianGender" id="ComedianGender"><br>
    <input type="submit" name="submit" id="submit">
</form>

<?php

$titre = "Comedian List";
$titre_secondaire = "Comedian List";
$contenu = ob_get_clean();
require "view/template.php";
