<?php
    include("../classes/user.php");
    include("../classes/upload.php");

    session_start();
    
    if(!ISSET($_SESSION["user"]) || !$_SESSION["user"]->loggedIn)
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    if(!ISSET($_POST["id"]))
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    $comment = $_POST["comment"];
    //TODO: Check if there is something wrong with comment
    
    $conn = new Mongo();
    $db = $conn->fitspo;
    $collection = $db->uploads;
    $mId = new MongoId($_POST["id"]);
    $upload = $collection->findOne(array( "_id" => $mId));
    
    if($upload == null){
        $conn->close();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    $image = new Upload($_POST["id"]);
    
    $image->addComment($_SESSION["user"]->id, $comment);
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);