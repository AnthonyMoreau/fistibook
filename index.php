<?php 

    if(isset($_GET["page"])){
        
        $page = $_GET["page"];

    } else {
        $page = "home";
    }

    if($page == "home"){
        require "pages/home.php";
    }

    elseif ($page == "contact"){
        require "pages/contact.php";
        
    } else {
        require "pages/home.php";
    }

?>