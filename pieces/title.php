<div id="top">
    <div id="title">
        Fitspo Share
    </div>
    <?php if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn){ ?>
    
    <?php } else { ?>
        <div id="login">
            <a href="signUp.php">Sign Up</a>
        </div>
    <?php } ?>
</div>