<?php
    require_once("classes/user.php");
    
    $user = new User(null);
    $user->signUp("laroccrj", "email", "pass", "pass");
    $user->addPicture("theidOfthepicture" + date("U"));
    
    var_dump($user);