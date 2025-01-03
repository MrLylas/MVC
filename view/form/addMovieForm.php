<?php ob_start();?>


<form action="index.php?action=addMovie" method="post">

    <label for="Name">Movie name</label>
    <input type="text" name="MovieName" id="MovieName"><br>

    <label for="ReleaseDate">Release date</label>
    <input type="date" name="ReleaseDate" id="ReleaseDate"><br>

    <label for="Duration">Duration</label>
    <input type="text" name="Duration" id="Duration"><br>

    <label for="Synopsis">Synopsis</label>
    <input type="text" name="Synopsis" id="Synopsis"><br>

    <label for="Rating">Rating</label>
    <input type="number" name="Rating" id="Rating" min="1" max="10"><br>

    <label for="Director">Director</label>
        <select id="Director" name="id_director">
            <?php
            while ($director = $directors->fetch()) {
            ?>  
            <option value='<?=$director['id_director']?>'><?=$director['director']?></option>
            
            <?php } ?>
        </select>

    <label for="Type">Type</label>
    <input type="number" name="Type" id="Type" min="1" max="10"><br>

    <input type="submit" name="submit" id="submit">
</form>

<?php

$titre = "Comedian List";
$titre_secondaire = "Comedian List";
$contenu = ob_get_clean();
require "view/template.php";
