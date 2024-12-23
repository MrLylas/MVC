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
    


}

