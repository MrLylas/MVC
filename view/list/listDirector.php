<?php ob_start();?>


<table class="movieTable">
    <thead>
        <tr>
            <th>Directors</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($listDirectors->fetchAll() as $directors){ ?>
                <tr>
                    <td><?=$directors["complete_name"]?></td>
                </tr>
           <?php } ?>
    </tbody>
</table>
<!-- <a href="http://mvc.test/index.php?action=addComedianForm">
    <div class="btnAdd">Add Director</div>
</a> -->

<?php

$titre = "Liste des Réalisateur";
$titre_secondaire = "Liste des Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";