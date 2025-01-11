<?php ob_start();?>

<form action="index.php?action=addCasting" method="post">
    
<label for="ComedianName">Comedian</label>
    <select id="ComedianName" name="id_comedian">
        <?php
            foreach ($comedians->fetchall() as $comedian) {
            ?>  
            <option value='<?=$comedian['id_comedian']?>'><?=$comedian['comedian_full_name']?></option>
        
        <?php }?> 
    </select><br>

<label for="MovieName">Movie</label>
<select id="MovieName" name="id_movie">
    <?php
        foreach ($movies->fetchall() as $movie) {
        ?>  
        <option value='<?=$movie['id_movie']?>'><?=$movie['movie_name']?></option>
    
    <?php }?> 
</select><br>

<label for="ComedianRole">Role</label>
<select id="RoleName" name="id_role">
    <?php
        foreach ($roles->fetchall() as $role) {
        ?>  
        <option value='<?=$role['id_role']?>'><?=$role['role_name']?></option>
    
    <?php }?> 
</select><br>

<input type="submit" name="submit" id="submit">

</form>

<?php

$titre = "Comedian List";
$titre_secondaire = "Comedian List";
$contenu = ob_get_clean();
require "view/template.php";
