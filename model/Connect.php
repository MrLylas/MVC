<?php

namespace Model;

abstract class Connect {
    const HOST = "localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS = "";

    public static function seConnecter(){
        try{
            // Connexion à la base de données avec PDO
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8",self::USER, self::PASS);
            } catch(\PDOException $ex){
                // Gestion des erreurs
                return $ex-->getMessage();
        }
    }
}


