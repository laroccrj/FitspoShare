<?php
    include("../classes/user.php");
    include("../classes/upload.php");

    session_start();
    
    if(!ISSET($_SESSION["user"]) || !$_SESSION["user"]->loggedIn)
        header("Location: ../index.php");
    
    /*
     * TODO: validation of the information
     */
    
    $title = $_POST["title"];
    
    $name = $_FILES["picture"]["name"];
    $n = 0;
    
    while(file_exists("../images/uploads/".$n.$name))
            $n++;

    $name = $n.$name;
    
    move_uploaded_file($_FILES["picture"]["tmp_name"],
      "../images/uploads/".$name);
    
    $picture = new Upload(null);
    
    $picture->newUpload($_SESSION["user"]->id, $title, $name, "picture");
    
    header("Location: ../viewImage.php?image=".$picture->id);
    