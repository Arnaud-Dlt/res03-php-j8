<?php

function checkRoute(string $route) : void 
{
    if($route === "connexion"){
        require 'pages/login.php';
    }
    else if($route === "creer-un-compte"){
        require 'pages/register.php';
    }
    else if($route === "admin-posts"){
        if($_SESSION["connectedUser"]===true)
        {
            require 'pages/admin/post.php';
        }
        else 
        {
            require 'pages/homepage.php';
            echo "Veuillez vous connecter";
        }
    }
    else if($route === "admin-categories"){
        if($_SESSION["connectedUser"]===true)
        {
            require 'pages/admin/post-category.php';
        }
        else 
        {
            require 'pages/homepage.php';
            echo "Veuillez vous connecter";
        }
    }
    else {
        require 'pages/homepage.php';
    }
}

?>