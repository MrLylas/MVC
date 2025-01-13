<?php ob_start();?>


<table class="ComedianTable">
    <tbody>
        <?php foreach($comedians->fetchAll() as $comedian){ ?>
            <tr>
                <td>
                    <img src="public/images/person/<?php if ($comedian["poster"]) {echo $comedian["poster"] ;
                    } else 
                        {echo "placeholder.svg?height=350&width=250";
                    } ?>"> 
                    <a href="index.php?action=comedianInfo&id=<?= $comedian['id_comedian'] ?>"> 
                    <?= $comedian['full_name'] ?>
                    </a>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<a href="index.php?action=addComedianForm">
    <div class="btnAdd">Add Comedian</div>
</a>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";





