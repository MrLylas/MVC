<?php 

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listfilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT movie_name, release_date
            FROM movie
        ");  
        
        require "view/listFilms.php";
    }
    public function listCategory(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT type_name
            FROM movie_type
        ");
 
        require "view/listCategory.php";
 
    }

}

