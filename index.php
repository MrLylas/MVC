<?php

use Controller\CinemaController;
 spl_autoload_register(function($class_name){
    include $class_name.'.php';
 });

 $ctrlCinema = new CinemaController();

 use Controller\PersonController;
 spl_autoload_register(function($class_name){
    include $class_name.'.php';
 });

 $ctrlPerson = new PersonController();

 if(isset($_GET["action"])){
    switch ($_GET["action"]){

        case "listFilms" : $ctrlCinema->listFilms();break;
        case "listActeurs" : $ctrlPerson->listActeurs();break;
        case "listCategory" : $ctrlCinema->listCategory();break;
        case "Comedianinfo" : $ctrlPerson->infoComedian();break;

    }
 }