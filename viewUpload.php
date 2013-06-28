<?php
    include("basicIncludes.php");
    session_start();
    require_once 'classes/upload.php';
    
    if(isset($_GET["upload"]))
        $image = new Upload($_GET["upload"]);
    else
        header("Location: index.php");
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fitspo Army</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/top.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/image.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="js/arrow.js"></script>
        <script src="js/inputOverlay.js"></script>
    </head>
    <body>
        <div id="container">
            <?php include "pieces/title.php" ?>
            <div id="content">
                <h1><?php echo $image->title; ?></h1>
                <div id="imageContainer">
                    <div id="image">
                        <img src="images/uploads/<?php echo $image->path; ?>">
                    </div>
                    <?php if($image->getPrevId() != null) { ?>
                        <a href="viewUpload.php?upload=<?php echo $image->getPrevId(); ?>">
                            <div id="leftArrow" class="arrow">
                                <img src="images/static/arrow.png">
                            </div>
                        </a>
                    <?php } ?>
                    <?php if($image->getNextId() != null) { ?>
                        <a href="viewUpload.php?upload=<?php echo $image->getNextId(); ?>">
                            <div id="rightArrow" class="arrow">
                                <img src="images/static/arrow.png">
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div id="uploadInfo">
                    Posted By: <?php echo $image->user->nickname; ?> <br />
                    High Fives: <?php echo $image->highFives; ?><br />
                    <?php
                        if(ISSET($_SESSION["user"]) &&
                                $_SESSION["user"]->loggedIn &&
                                $image->authorId != $_SESSION["user"]->id &&
                                !$_SESSION["user"]->checkHighFive($image->number)){
                    ?>
                        <a href="actions/highFive.php?image=<?php echo $image->id; ?>">High Five!</a><br />
                    <?php
                        }
                    ?>
                </div>
                <div>
                    <?php
                        if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn){
                    ?>
                        <div id="newComment">
                            <form action="actions/newComment.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $image->id; ?>">
                                <div class="input">
                                    <textarea class="overlayed" name="comment"></textarea>
                                    <div class="overlay" unselectable="on">
                                        Leave a comment...
                                    </div>
                                </div>
                                <input type="submit" value="Comment">
                            </form>
                        </div>
                    <?php
                        } else {
                    ?>
                        <div id="newComment">You must login or <a href="signUp.php">sign-up</a> to comment</div>
                    <?php } ?>
                    <?php foreach($image->comments as $comment){ 
                                $user = new User($comment["userId"]);
                    ?>
                        <div class="comment">
                            <div class="name">
                                <div class="profilePic">
                                    <img src="images/profile/<?php echo $user->profilePicture; ?>" >
                                </div>
                                <?php echo $user->nickname; ?>
                            </div>
                            <div class="content"><?php echo $comment["comment"]; ?></div>
                            <div class="date">
                                <?php 
                                    $epoch = $comment["date"];
                                    $dt = new DateTime("@$epoch");
                                    echo $dt->format('H:i - d M, Y'); 
                                ?>
                            </div>
                            <?php foreach($image->getReplies($comment["number"]) as $reply){ 
                                        $user = new User($reply["userId"]);
                            ?>
                                <div class="reply">
                                    <div class="name">
                                        <div class="profilePic">
                                            <img src="images/profile/<?php echo $user->profilePicture; ?>" >
                                        </div>
                                        <?php echo $user->nickname; ?>
                                    </div>
                                    <div class="content"><?php echo $reply["comment"]; ?></div>
                                    <div class="date">
                                        <?php 
                                            $epoch = $reply["date"];
                                            $dt = new DateTime("@$epoch");
                                            echo $dt->format('H:i - d M, Y'); 
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>   
                            <?php
                                if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn){
                            ?>
                                <div class="newReply">
                                    <form action="actions/newReply.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $image->id; ?>">
                                        <input type="hidden" name="number" value="<?php echo $comment["number"]; ?>">
                                        <div class="input">
                                            <textarea class="overlayed" name="comment"></textarea>
                                            <div class="overlay" unselectable="on">
                                                Leave a reply...
                                            </div>
                                        </div>
                                        <input type="submit" value="Reply">
                                    </form>
                                </div>
                            <?php
                                } else {
                            ?>
                                <div id="newComment">You must login or <a href="signUp.php">sign-up</a> to reply</div>
                            <?php } ?>
                        </div>
                    <?php } ?>    
                </div>
            </div>
        </div>
    </body>
</html>