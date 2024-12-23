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
}

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_comedian, id_person
            FROM comedian
        ");  
        
        require "view/listFilms.php";}

