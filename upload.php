<?php
    include("basicIncludes.php");
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ftifam Strong</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/top.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/upload.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script src="js/inputOverlay.js"></script>
        <script src="js/uploadImgPrev.js"></script>
    </head>
    <body>
        <div id="container">
            <?php include "pieces/title.php" ?>
            <div id="content">
                <h1>Upload a Picture</h1>
                <div id="uploadForm">
                    <div id="form">
                        <form action="actions/uploadPicture.php" method="post" enctype="multipart/form-data">
                            <p>
                                <span class="label">Title:</span><br />
                                <input name="title" type="text">
                            </p>
                            <p>
                                <span class="label">Picture:</span><br />
                                <input type="file" name="picture" id="inPic" >
                            </p>
                            <input type="submit"><br />
                        </form>
                    </div>
                    <div id="preview">
                        <img>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
