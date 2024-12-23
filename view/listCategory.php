<?php ob_start();?>

<p class="movieCount">Il y a <?=$requete->rowCount()?> films</p>

<table class="movieTable">
    <thead>
        <tr>
            <th>Categories</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $category){ ?>
                <tr>
                    <td><?=$category["type_name"]?></td>
                </tr>
           <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";