<?php 

namespace Controller;
use Model\Connect;

class TypeController {

    public function listCategory(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT type_name, id_type
            FROM movie_type
        ");
    
        require "view/list/listCategory.php";
    
    }

    
    public function addTypeForm(){

        require "view/form/addTypeForm.php";
    }

    public function addType(){

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

    public function ByCategory($id){
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("

        SELECT mov.id_movie,mov.movie_name, mov.release_date, mov.rating,mov.movie_poster,CONCAT (per.person_name,' ',per.person_forename) AS full_name, dir.id_director,ty.id_type,ty.type_name
        FROM movie mov
        INNER JOIN director dir 
        ON mov.id_director = dir.id_director
        INNER JOIN person per
        ON dir.id_person = per.id_person
        INNER JOIN movie_type ty
        ON mov.id_type = ty.id_type
        WHERE ty.id_type = :id");
    
        $requete->execute(["id"=>$id]);

        require "view/info/byCategory.php";
 
    }

}