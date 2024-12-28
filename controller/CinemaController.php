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

        require "view/info/filmInfo.php";
 
    }

    public function addMovieForm(){

        require "view/form/addMovieForm.php";
    }

    public function addMovie(){

        //Lors de l'appui du bouton submit lancer la condition :

        if(isset($_POST['submit'])){

            //Application des filtres sur les données récupérées du formulaires

            $movieName = filter_input(INPUT_POST,"MovieName",FILTER_SANITIZE_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST,"Duration",FILTER_SANITIZE_SPECIAL_CHARS);
            $releaseDate = filter_input(INPUT_POST,"ReleaseDate",FILTER_SANITIZE_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST,"Synopsis",FILTER_SANITIZE_SPECIAL_CHARS);
            $rating = filter_input(INPUT_POST,"Rating",FILTER_SANITIZE_SPECIAL_CHARS);

            //la condition se lance si les données entrée entrées sont valides : 

            if($movieName && $director && $duration && $releaseDate && $synopsis && $rating){

                //Préparation de la requête :

                $pdo = Connect :: seConnecter();
                $addMovie = $pdo->prepare("
                    INSERT INTO movie (movie_name, release_date, duration, synopsis, rating)
                    VALUES (:MovieName,:ReleaseDate,:Duration,:Synopsis,:Rating);

                ");

                //Execution de la requête :
            
                $addMovie->execute([
                    "MovieName"=>$movieName,
                    "Duration"=>$duration,
                    "ReleaseDate"=>$releaseDate,
                    "Synopsis"=>$synopsis,
                    "Rating"=>$rating
                ]);


                header("Location:index.php?action=listFilms");
            }
        }
        require "view/listFilms.php";
    }

}

