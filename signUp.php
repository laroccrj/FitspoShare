<?php
    include("basicIncludes.php");
    session_start();
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
        <link rel="stylesheet" href="css/signUp.css" />
    </head>
    <body>
        <div id="container">
            <?php include "pieces/title.php" ?>
            <?php include "pieces/nav.php" ?>
            <div id="content">
                <h1>Sign Up Now<br />
                <span class="subheader">You can start getting inspired, or start inspiring!</span></h1>
                <form action="actions/signup.php" method="post">
                    <table id="signup">
                        <tr>
                            <td class="fieldName">
                                Username:
                            </td>
                            <td class="fieldValue">
                                <input type="text" name="username" value="<?php $error->checkValue("signUp", "username"); ?>"><br />
                                <?php $error->checkError("signUp", "username"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                                Email:
                            </td>
                            <td class="fieldValue">
                                <input type="text" name="email" value="<?php $error->checkValue("signUp", "email"); ?>"><br />
                                <?php $error->checkError("signUp", "email"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                                Password:
                            </td>
                            <td class="fieldValue">
                                <input type="password" name="password"><br />
                                <?php $error->checkError("signUp", "password"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                                Confirm Password:
                            </td>
                            <td class="fieldValue">
                                <input type="password" name="confPassword"><br />
                                <?php $error->checkError("signUp", "confPassword"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                            </td>
                            <td class="fieldValue">
                                <input type="submit" name="submit" id="submit" value="Sign Up">
                                <?php $error->deleteErrors("signUp"); ?>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>