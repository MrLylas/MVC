<?php 

namespace Controller;
use Model\Connect;

class TypeController {

    public function listCategory(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT type_name
            FROM movie_type
        ");
    
        require "view/list/listCategory.php";
    
    }

    
    public function addTypeForm(){

        require "view/form/addTypeForm.php";
    }

    public function addType(){

        var_dump("bonjour");

        if(isset($_POST['submit'])){

            $typeName = filter_input(INPUT_POST,"typeName",FILTER_SANITIZE_SPECIAL_CHARS);

            if($typeName){
                $pdo = Connect :: seConnecter();
                $addType = $pdo->prepare("
                    INSERT INTO movie_type (type_name)
                    VALUES (:typeName)
                ");
            
                $addType->execute(["typeName"=>$typeName]);

                header("Location:index.php?action=listFilms");
            }
        }
        require "view/list/listCategory.php";
    }

}