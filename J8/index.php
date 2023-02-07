<?php
session_start();

require 'logic/router.php';
require 'logic/database.php';

if(isset($_GET["route"])){
    
    $route=$_GET['route'];
    
    checkRoute($route);
}

else {
    checkRoute("");
};

//CONDITION INSCRIPTION

if(isset($_POST["first_name"]) && !empty($_POST["first_name"])
&& isset($_POST["last_name"]) && !empty($_POST["last_name"])
&& isset($_POST["emailRegister"]) && !empty($_POST["emailRegister"])
&& isset($_POST["passwordRegister"]) && !empty($_POST["passwordRegister"])
&& isset($_POST["confirm-password"]) && !empty($_POST["confirm-password"]))
{
    if($_POST["passwordRegister"] === $_POST["confirm-password"]){
        
        $hashPwd=password_hash($_POST["passwordRegister"], PASSWORD_DEFAULT);
        
        $newUser=new User($_POST['first_name'],$_POST['last_name'],$_POST['emailRegister'], $hashPwd);
        
        saveUser($newUser);
    }
    
    else {
        echo "Les mots de passe sont différents !";
    }
    
    if(loadUser($_POST['emailRegister']===null)){
        echo "Email déjà utilisé";
    }

}
else if(isset($_POST['first_name']) && empty($_POST['first_name'])){
    echo "Veuillez saisir un Prenom";
}
else if(isset($_POST['last_name']) && empty($_POST['last_name'])){
    echo "Veuillez saisir un Nom";
}
else if(isset($_POST['emailRegister']) && empty($_POST['emailRegister'])){
    echo "Veuillez saisir un Email";
}

//CONDITION CONNEXION

if(isset($_POST['emailLog'])&& !empty($_POST["emailLog"]) && isset($_POST['passwordLog']) && !empty($_POST["passwordLog"]))
{
    $logEmail=$_POST["emailLog"];
    $pwd=$_POST["passwordLog"];
    $userToConnect=loadUser($logEmail);
    
    if(password_verify($pwd, $userToConnect->getPassword()))
    {
        echo "Bienvenue";
        $_GET["route"]="admin-posts";
        $_SESSION["connectedUser"] = true;
        $_SESSION["userId"] = $userToConnect->getId();
    }
    else 
    {
        echo "Identifiants inconnus";
        
    }
}


?>


