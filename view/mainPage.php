<?php ob_start();?>

<body>

</body>


<?php

$titre = "ProntoCine";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";