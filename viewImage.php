<?php
    include("basicIncludes.php");
    session_start();
    require_once 'classes/upload.php';
    
    if(isset($_GET["image"]))
        $image = new Upload($_GET["image"]);
    else
        header("Location: index.php");
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fitspo Share</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/top.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/image.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="arrow.js"></script>
    </head>
    <body>
        <div id="container">
            <?php include "pieces/title.php" ?>
            <div id="content">
                <h1>The title of the image</h1>
                <div id="imageContainer">
                    <div id="image">
                        <img src="images/uploads/<?php echo $image->path; ?>">
                    </div>
                    <div id="leftArrow" class="arrow">
                        <img src="images/static/arrow.png">
                    </div>
                    <div id="rightArrow" class="arrow">
                        <img src="images/static/arrow.png">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>