<?php ob_start();?>

<table class="movieTable">
    <thead>
        <tr>
            <th>Categories</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $category){ ?>
            <a href="index.php?action=ByCategory&id=<?= $category["id_type"] ?>">
                <?=$category["type_name"]?>
            </a>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?action=addTypeForm">
    <div class="btnAdd">Add Category</div>
</a>

<?php

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";