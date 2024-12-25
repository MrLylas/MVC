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


    public function infoFilm(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT 
                mov.movie_name,mov.release_date,
                ROUND(mov.duration / 60, 2) AS hours_duration ,
                per.person_name,per.person_forename 
            FROM 
                movie mov
            INNER JOIN 
                director dir 
            ON mov.id_director = dir.id_director
            INNER JOIN 
                person per 
            ON dir.id_person = per.id_person
        ");

        require "view/filmInfo.php";
 
    }

}

