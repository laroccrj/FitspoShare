<?php
    include("../classes/user.php");
    include("../classes/upload.php");

    session_start();
    
    if(!ISSET($_SESSION["user"]) || !$_SESSION["user"]->loggedIn)
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    if(!ISSET($_GET["image"]))
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    $conn = new Mongo();
    $db = $conn->fitspo;
    $collection = $db->uploads;
    $mId = new MongoId($_GET["image"]);
    $upload = $collection->findOne(array( "_id" => $mId));
    
    if($upload == null){
        $conn->close();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    $image = new Upload($_GET["image"]);
    
    if($_SESSION["user"]->checkHighFive($image->number))
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    $image->addHighFive();
    $_SESSION["user"]->addHighFiveHistory($image->number);
    $image->user->addHighFive();
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
