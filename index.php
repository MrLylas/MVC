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

 use Controller\MainPageController;
 spl_autoload_register(function($class_name){
    include $class_name.'.php';
 });

 $ctrlMainPage = new MainPageController();

 if(isset($_GET["action"])){
    switch ($_GET["action"]){

         //List

        case "listFilms" : $ctrlCinema->listFilms();break;
        case "listActeurs" : $ctrlPerson->listActeurs();break;
        case "listCategory" : $ctrlCategory->listCategory();break;
        case "listDirector" : $ctrlPerson->listDirectors();break;
        case "mainPage" : $ctrlMainPage->mainPage();break;

        //Info

        case "filmInfo" : $ctrlCinema->infoFilm();break;
        case "comedianInfo" : $ctrlPerson->infoComedian();break;

        //Form

        case "addTypeForm" : $ctrlCategory->addTypeForm();break;
        case "addComedianForm" : $ctrlPerson->addComedianForm();break;
        case "addMovieForm" : $ctrlCinema->addMovieForm();break;

        //Add

        case "addType" : $ctrlCategory->addType();break;
        case "addComedian" : $ctrlPerson->addComedian();break;
        case "addMovie" : $ctrlCinema->addMovie();break;

    }
 }