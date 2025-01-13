<?php ob_start();?>


<?php
    foreach($listDirectors->fetchAll() as $director){ ?>
    <div class="card">
        <img src="public/images/<?php if ($director["poster"]) {echo $director["poster"] ;
                        } else 
                            {echo "placeholder.svg?height=350&width=250";
                        } ?>"> 
        <a href="index.php?action=DirectorInfo&id=<?= $director['id_director'] ?>">
            <?=$director["complete_name"]?>
        </a>
    </div>

<?php } ?>


<a href="index.php?action=addDirectorForm">
    <div class="btnAdd">Add Director</div>
</a>

<?php

$titre = "Liste des Réalisateur";
$titre_secondaire = "Liste des Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";


