<div id="top">
    <div id="title">
        Fitspo Share
    </div>
    <div id="access">
        <?php if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn){ ?>
            <div id="info">
                
                <div id="img">
                    <img src="images/profile/<?php echo $_SESSION["user"]->profilePicture; ?>" >
                </div>
                <?php echo $_SESSION["user"]->nickname; ?>
            </div>
        <?php } else { ?>
            <div id="login">
                <a href="signUp.php">Sign Up</a><br />
                <form action="actions/login.php" method="post">
                    Username: <input type="text" name="username"> 
                    <?php $error->checkError("lgoin", "username"); ?><br />
                    Password: <input type="password" name="password"> <br />
                    <input type="submit">
                </form>
            </div>
        <?php } ?>
    </div>
</div>