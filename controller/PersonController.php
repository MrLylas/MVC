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
            SELECT type_name
            FROM movie_type
        ");
    
        require "view/listCategory.php";}

}

