<?php 

namespace Controller;
use Model\Connect;

class PersonController {

    //Fonction servant à lister les Acterus de la BDD

    public function listActeurs(){
    
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT person_name, person_forename
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


    //Fonction servant à lister les informations sur les Acteurs de la BDD

    public function infoComedian(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT 
                person_name,
                    person_forename,
                    nationality,
                    birth_date,gender,
                    poster
                FROM comedian com
                INNER JOIN person per
                ON com.id_comedian = per.id_person
        ");
    
        require "view/info/comedianInfo.php";}

    public function addComedianForm(){

        require "view/form/addComedianForm.php";
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


    


}

