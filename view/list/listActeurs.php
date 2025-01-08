<?php ob_start();?>


<table class="ComedianTable">
    <tbody>
        <?php foreach($requete->fetchAll() as $comedian){ ?>
            <tr>
                <td>
                    <a href="index.php?action=comedianInfo&id=<?= $comedian['id_comedian'] ?>">
                        <?= $comedian['full_name'] ?>
                    </a>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";





