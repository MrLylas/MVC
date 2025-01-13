<?php ob_start();?>

<form action="index.php?action=addCasting" method="post">
    
<label for="comedianName">Comedian</label>
    <select id="comedianName" name="comedianName">
        <?php
            foreach ($comedians->fetchall() as $comedian) {
            ?>  
            <option value='<?=$comedian['id_comedian']?>'><?=$comedian['comedian_full_name']?></option>
        
        <?php }?> 
    </select><br>

<label for="movieName">Movie</label>
<select id="movieName" name="movieName">
    <?php
        foreach ($movies->fetchall() as $movie) {
        ?>  
        <option value='<?=$movie['id_movie']?>'><?=$movie['movie_name']?></option>
    
    <?php }?> 
</select><br>

<label for="comedianRole">Role</label>
<select id="roleName" name="roleName">
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
