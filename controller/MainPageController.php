<?php

namespace Controller;

class MainPageController {
    public function redirect(){

        header("location: index.php?action=mainPage");

    }

    public function mainPage(){
    
        require ("view/mainPage.php");
    
    }
}


