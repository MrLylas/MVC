<?php 

namespace Controller;
use Model\Connect;
use PDOException;

class CinemaController {

    public function listfilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT movie_name, release_date
            FROM movie
        ");  
        
        require "view/list/listFilms.php";
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

        $pdo = Connect::seConnecter();

        $directors = $pdo->query("SELECT dir.id_director, concat(per.person_name,' ',per.person_forename) AS full_name FROM director dir INNER JOIN person per ON dir.id_person = per.id_person");

        $types = $pdo->query(" SELECT id_type,type_name FROM movie_type ");

        require "view/form/addMovieForm.php";
    }

    public function addMovie() {
        if (isset($_POST['submit'])) {
            // Filtres des données entrées par l'utilisateur
            $movieName = filter_input(INPUT_POST, "MovieName", FILTER_SANITIZE_SPECIAL_CHARS);
            $releaseDate = filter_input(INPUT_POST, "ReleaseDate", FILTER_SANITIZE_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST, "Duration", FILTER_VALIDATE_INT);
            $synopsis = filter_input(INPUT_POST, "Synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
            $rating = filter_input(INPUT_POST, "Rating", FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 10]]);
            $director = filter_input(INPUT_POST, "Director", FILTER_SANITIZE_SPECIAL_CHARS);
            $type = filter_input(INPUT_POST, "Type", FILTER_VALIDATE_INT);
    
            // Vérification des données
            if ($movieName && $releaseDate && $duration && $synopsis && $rating && $director && $type) {
                try {
                    // Préparation de la requête
                    $pdo = Connect::seConnecter();
                    $addMovie = $pdo->prepare("
                        INSERT INTO movie (movie_name, release_date, duration, synopsis, rating, id_director, id_type)
                        VALUES (:MovieName, :ReleaseDate, :Duration, :Synopsis, :Rating, :Director, :Type);
                    ");
    
                    // Exécution de la requête
                    $addMovie->execute([
                        "MovieName" => $movieName,
                        "Duration" => $duration,
                        "ReleaseDate" => $releaseDate,
                        "Synopsis" => $synopsis,
                        "Rating" => $rating,
                        "Director" => $director,
                        "Type" => $type
                    ]);
    
                    header("Location: index.php?action=listFilms");
                    exit;
                } catch (PDOException $e) {
                    // Gestion des erreurs
                    echo "Erreur lors de l'ajout du film : " . $e->getMessage();
                }
            } else {
                echo "Veuillez remplir tous les champs correctement.";
            }
        }
        require "view/list/listFilms.php";
    }
    

}

