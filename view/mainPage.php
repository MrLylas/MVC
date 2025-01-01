<?php ob_start();?>

<body>
    
</body>


<?php

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";