<?php
    include("../classes/user.php");
    
    session_start();
    
    if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn)
        header("Location: ../index.php");
    
    $_SESSION["user"] = new User(null);
    
    $_SESSION["user"]->login($_POST["username"],$_POST["password"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);