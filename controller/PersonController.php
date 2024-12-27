<?php 

namespace Controller;
use Model\Connect;

class PersonController {

    public function listActeurs(){
    
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT person_name, person_forename
            FROM comedian com
            INNER JOIN person per
            ON com.id_person = per.id_person
        ");  

        require "view/listActeurs.php";}

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
    
        require "view/comedianInfo.php";}

    public function addComedianForm(){

        require "view/form/addComedianForm.php";
    }

    public function addType(){

        if(isset($_POST['submit'])){

            $NewComedian = filter_input(INPUT_POST,"ComedianName",FILTER_SANITIZE_SPECIAL_CHARS);
                            filter_input(INPUT_POST,"ComedianForename",FILTER_SANITIZE_SPECIAL_CHARS);
                            filter_input(INPUT_POST,"ComedianNationality",FILTER_SANITIZE_SPECIAL_CHARS);
                            filter_input(INPUT_POST,"ComedianBirthdate",FILTER_SANITIZE_SPECIAL_CHARS);
                            filter_input(INPUT_POST,"ComedianGender",FILTER_SANITIZE_SPECIAL_CHARS);

            if($NewComedian){
                $pdo = Connect :: seConnecter();
                $addComedian = $pdo->prepare("
                    INSERT INTO person (person_name, person_forename, nationality, birth_date, gender)
                    VALUES (:ComedianName, :ComedianForename,:ComedianNationality,:ComedianBirthdate,:ComedianGender);

                    -- Récupérer l'identifiant de la personne insérée
                    SET @new_person_id = LAST_INSERT_ID();

                    -- Insérer dans la table `comedian` en utilisant l'identifiant récupéré
                    INSERT INTO comedian (id_person)
                    VALUES (@new_person_id);

                ");
            
                $addComedian->execute(["ComedianName"=>$NewComedian]);
                $addComedian->execute(["ComedianForename"=>$NewComedian]);
                $addComedian->execute(["ComedianNationality"=>$NewComedian]);
                $addComedian->execute(["ComedianBirthdate"=>$NewComedian]);
                $addComedian->execute(["ComedianGender"=>$NewComedian]);

                header("Location:index.php?action=listActeurs");
            }
        }
        require "view/listActeurs.php";
    }


    


}

