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

<a href="http://mvc.test/index.php?action=addTypeForm">
    <div class="btnAdd">Add Category</div>
</a>

<?php

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";