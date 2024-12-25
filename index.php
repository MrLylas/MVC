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


 use Controller\TypeController;
 spl_autoload_register(function($class_name){
    include $class_name.'.php';
 });

 $ctrlCategory = new TypeController();

 if(isset($_GET["action"])){
    switch ($_GET["action"]){

        case "listFilms" : $ctrlCinema->listFilms();break;
        case "listActeurs" : $ctrlPerson->listActeurs();break;
        case "listCategory" : $ctrlCategory->listCategory();break;
        case "filmInfo" : $ctrlCinema->infoFilm();break;
        case "comedianInfo" : $ctrlPerson->infoComedian();break;
        case "addTypeForm" : $ctrlCategory->addTypeForm();break;
        case "addType" : $ctrlCategory->addType();break;
        

    }
 }