<?php
    require_once("classes/user.php");
    
    $user = new User(null);
    $user->signUp("laroccrj", "email", "pass", "pass");
    
    var_dump($user);