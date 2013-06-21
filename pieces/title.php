<div id="top">
    <div id="title">
        Fitspo Share
    </div>
    <?php if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn){ ?>
    
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