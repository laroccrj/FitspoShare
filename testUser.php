<?php
    require_once("classes/user.php");
    
    $user = new User("51c202566803fa7a03733317");
   // $user->signUp("laroccrj", "email", "pass", "pass");
    $user->addFavoritPicture("thePicId");
    var_dump($user);