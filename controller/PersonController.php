<?php 

namespace Controller;
use Model\Connect;

class PersonController {

    //Fonction servant à lister les Acterus de la BDD

    public function listActeurs(){
    
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT CONCAT (per.person_name,' ', per.person_forename) AS full_name, per.id_person, com.id_comedian
            FROM comedian com
            INNER JOIN person per
            ON com.id_person = per.id_person
        ");  

        require "view/list/listActeurs.php";}

    public function listDirectors(){

        $pdo = Connect::seConnecter();
        $listDirectors = $pdo->query("
            SELECT dir.id_director, per.id_person, CONCAT(person_forename,' ',person_name) AS complete_name
            FROM director dir
            INNER JOIN person per
            ON dir.id_person = per.id_person 
        ");  

        require "view/list/listDirector.php";}


    public function comedianInfo($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT CONCAT(person_forename,' ',person_name) AS person_fullname, per.gender, per.birth_date
        FROM comedian com
        INNER JOIN person per 
        ON per.id_person = com.id_person
        where com.id_comedian = :id");
    
        $requete->execute(["id"=>$id]);

        $ComedianMovieInfo=$pdo->prepare("
                SELECT mov.movie_name, mov.duration, mov.rating, mov.release_date, mov.movie_poster, mov.id_movie
        FROM comedian com
        INNER JOIN person per ON per.id_person = com.id_person
        INNER JOIN have hav ON hav.id_comedian = com.id_comedian
        INNER JOIN movie mov ON mov.id_movie = hav.id_movie
      	WHERE com.id_comedian = :id");


        $ComedianMovieInfo->execute(["id"=>$id]);

    
        require "view/info/comedianInfo.php";
    }


    public function DirectorInfo($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT CONCAT(person_forename,' ',person_name) AS person_fullname, per.gender, per.birth_date
        FROM director dir
        INNER JOIN person per 
        ON per.id_person = dir.id_person
        where dir.id_director = :id");
    
        $requete->execute(["id"=>$id]);

        $DirectorMovieInfo=$pdo->prepare("
                SELECT mov.movie_name, mov.duration, mov.rating, mov.release_date, mov.movie_poster, mov.id_movie
        FROM comedian com
        INNER JOIN person per ON per.id_person = com.id_person
        INNER JOIN have hav ON hav.id_comedian = com.id_comedian
        INNER JOIN movie mov ON mov.id_movie = hav.id_movie
      	WHERE com.id_comedian = :id");


        $DirectorMovieInfo->execute(["id"=>$id]);

    
        require "view/info/DirectorInfo.php";
    }

    public function addComedianForm(){

        require "view/form/addComedianForm.php";
    }

    public function addDirectorForm(){

        require "view/form/addDirectorForm.php";
    }

    //Fonction servant à ajouter un Comedien à la BDD

    public function addComedian(){

        //Lors de l'appui du bouton submit lancer la condition :

        if(isset($_POST['submit'])){

            //Application des filtres sur les données récupérées du formulaires

            $ComedianName = filter_input(INPUT_POST,"ComedianName",FILTER_SANITIZE_SPECIAL_CHARS);
            $ComedianForename = filter_input(INPUT_POST,"ComedianForename",FILTER_SANITIZE_SPECIAL_CHARS);
            $ComedianNationality = filter_input(INPUT_POST,"ComedianNationality",FILTER_SANITIZE_SPECIAL_CHARS);
            $ComedianBirthdate = filter_input(INPUT_POST,"ComedianBirthdate",FILTER_SANITIZE_SPECIAL_CHARS);
            $ComedianGender = filter_input(INPUT_POST,"ComedianGender",FILTER_SANITIZE_SPECIAL_CHARS);

            //la condition se lance si les données entrée entrées sont valides : 

            if($ComedianName && $ComedianForename && $ComedianNationality && $ComedianBirthdate && $ComedianGender){

                //Préparation de la requête :

                $pdo = Connect :: seConnecter();
                $addComedian = $pdo->prepare("
                    INSERT INTO person (person_name, person_forename, nationality, birth_date, gender)
                    VALUES (:ComedianName, :ComedianForename,:ComedianNationality,:ComedianBirthdate,:ComedianGender);

                    SET @new_person_id = LAST_INSERT_ID();

                    INSERT INTO comedian (id_person)
                    VALUES (@new_person_id);

                ");

                //Execution de la requête :
            
                $addComedian->execute([
                    "ComedianName"=>$ComedianName,
                    "ComedianForename"=>$ComedianForename,
                    "ComedianNationality"=>$ComedianNationality,
                    "ComedianBirthdate"=>$ComedianBirthdate,
                    "ComedianGender"=>$ComedianGender
                ]);


                header("Location:index.php?action=listActeurs");
            }
        }
        require "view/listActeurs.php";
    }

    public function addDirector(){

        //Lors de l'appui du bouton submit lancer la condition :

        if(isset($_POST['submit'])){

            //Application des filtres sur les données récupérées du formulaires

            $DirectorName = filter_input(INPUT_POST,"DirectorName",FILTER_SANITIZE_SPECIAL_CHARS);
            $DirectorForename = filter_input(INPUT_POST,"DirectorForename",FILTER_SANITIZE_SPECIAL_CHARS);
            $DirectorNationality = filter_input(INPUT_POST,"DirectorNationality",FILTER_SANITIZE_SPECIAL_CHARS);
            $DirectorBirthdate = filter_input(INPUT_POST,"DirectorBirthdate",FILTER_SANITIZE_SPECIAL_CHARS);
            $DirectorGender = filter_input(INPUT_POST,"DirectorGender",FILTER_SANITIZE_SPECIAL_CHARS);

            //la condition se lance si les données entrée entrées sont valides : 

            if($DirectorName && $DirectorForename && $DirectorNationality && $DirectorBirthdate && $DirectorGender){

                //Préparation de la requête :

                $pdo = Connect :: seConnecter();
                $addComedian = $pdo->prepare("
                    INSERT INTO person (person_name, person_forename, nationality, birth_date, gender)
                    VALUES (:DirectorName, :DirectorForename,:DirectorNationality,:DirectorBirthdate,:DirectorGender);

                    SET @new_person_id = LAST_INSERT_ID();

                    INSERT INTO director (id_person)
                    VALUES (@new_person_id);

                ");

                //Execution de la requête :
            
                $addComedian->execute([
                    "DirectorName"=>$DirectorName,
                    "DirectorForename"=>$DirectorForename,
                    "DirectorNationality"=>$DirectorNationality,
                    "DirectorBirthdate"=>$DirectorBirthdate,
                    "DirectorGender"=>$DirectorGender
                ]);


                header("Location:index.php?action=listDirector");
            }
        }
        require "view/listDirector.php";
    }




    


}

