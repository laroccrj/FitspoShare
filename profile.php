<?php
    include("basicIncludes.php");
    session_start();
    require_once 'classes/upload.php';
    
    if(isset($_GET["id"]))
        $user = new User($_GET["id"]);
    else
        header("Location: index.php");
      
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fitfam Strong</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/top.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/user.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script src="js/inputOverlay.js"></script>
    </head>
    <body>
        <div id="container">
            <?php include "pieces/title.php" ?>
            <div id="content">
                <div id="profilePicture">
                    <img src="images/profile/<?php echo $user->profilePicture; ?>">
                </div>
                <div id="information">
                    <div class="name"><?php echo $user->nickname; ?></div>
                    <div class="highFives"><img src="images/static/highfive.png"><?php echo $user->highFives; ?></div>
                </div>
                <div id="uploads">
                    <h1>Uploads</h1>
                    <?php
                        if(count($user->pictures) <= 0){
                    ?>
                        <span class="none">User has no uploads...</span>
                    <?php
                       } else {
                        $conn = new Mongo();
                        $db = $conn->fitspo;
                        $collection = $db->uploads;
                        
                        foreach ($user->pictures as $picture) {
                            
                            $value = $collection->findOne(array("_id" => new MongoId($picture)));
                            
                            if(strlen($value["title"]) > 20) {
                                $title = "";
                                for($i = 0; $i < 20; $i++){
                                    $title .= $value["title"][$i];
                                }
                                $title .= "...";
                            } else {
                                $title = $value["title"];
                            }
                            ?>
                                <a href="viewUpload.php?upload=<?php echo $value["_id"]; ?>">
                                <div class="upload">
                                    <h1><?php echo $title; ?></h1>
                                    <div class="image">
                                        <img src="images/uploads/<?php echo $value["path"]; ?>">
                                    </div>
                                    <div class="highFives"><?php echo $value["highFives"]; ?><img src="images/static/highfive.png"></div>
                                </div>
                                </a>
                            <?php
                        }
                       }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
