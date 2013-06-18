<?php
    include("../classes/user.php");
    
    session_start();
    
    if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn)
        header("Location: ../index.php");
    
    $_SESSION["user"] = new User(null);
    
    if($_SESSION["user"]->signUp($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confPassword"]) == "SUCCESS")
        header("Location: ../index.php");
    else
        header("Location: ../signUp.php");