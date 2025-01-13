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

         //Main

        case "mainPage" : $ctrlMainPage->mainPage();break;

         //List

        case "listFilms" : $ctrlCinema->listFilms();break;
        case "listCategory" : $ctrlCategory->listCategory();break;
        case "listDirector" : $ctrlPerson->listDirectors();break;
        case "listActeurs" : $ctrlPerson->listActeurs();break;
        

        //Info

        case "filmInfo" : $ctrlCinema->infoFilm($_GET["id"]);break;
        case "comedianInfo" : $ctrlPerson->comedianInfo($_GET["id"]);break;
        case "DirectorInfo" : $ctrlPerson->DirectorInfo($_GET["id"]);break;
        case "ByCategory" : $ctrlCategory->ByCategory($_GET["id"]);break;


        //Form

        case "addTypeForm" : $ctrlCategory->addTypeForm();break;
        case "addComedianForm" : $ctrlPerson->addComedianForm();break;
        case "addMovieForm" : $ctrlCinema->addMovieForm();break;
        case "addDirectorForm" : $ctrlPerson->addDirectorForm();break;
        case "addCastingForm" : $ctrlCinema->addCastingForm();break;

        //Add

        case "addType" : $ctrlCategory->addType();break;
        case "addComedian" : $ctrlPerson->addComedian();break;
        case "addMovie" : $ctrlCinema->addMovie();break;
        case "addDirector" : $ctrlPerson->addDirector();break;
        case "addCasting" : $ctrlCinema->addCasting();break;

        
      }
   }else{
      $ctrlMainPage->redirect();
   };