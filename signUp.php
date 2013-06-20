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
                <form action="actions/signUp.php" method="post">
                    <table id="signup">
                        <tr>
                            <td class="fieldName">
                                Username:
                            </td>
                            <td class="fieldValue">
                                <input type="text" id="username">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                                Email:
                            </td>
                            <td class="fieldValue">
                                <input type="text" id="email">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                                Password:
                            </td>
                            <td class="fieldValue">
                                <input type="password" id="password">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldName">
                                Confirm Password:
                            </td>
                            <td class="fieldValue">
                                <input type="confPassword" id="confPassword">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>