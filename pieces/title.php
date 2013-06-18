<div id="top">
    <a href="index.php">
        <div id="title">
            Fitspo Army
        </div>
    </a>
    <div id="access">
        <?php if(ISSET($_SESSION["user"]) && $_SESSION["user"]->loggedIn){ ?>
            <div id="info">
                <div id="img">
                    <img src="images/profile/<?php echo $_SESSION["user"]->profilePicture; ?>" >
                </div>
                <?php echo $_SESSION["user"]->nickname; ?>
            </div>
            <a href="logout.php">
                <div id="logout">
                    Log Out
                </div>
            </a>
        <?php } else { ?>
            <div id="login">
                <div>
                    <form action="actions/login.php" method="post">
                        <div class="input">
                            <input class="overlayed" type="text" name="username" >
                            <div class="overlay" unselectable="on">
                                Username
                            </div>
                        </div>
                        <?php $error->checkError("login", "username"); ?>
                        <div class="input">
                            <input class="overlayed" type="password" name="password" >
                            <div class="overlay" unselectable="on">
                                Password
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Log In" >
                        </div>
                        <div id="signup">
                            <a href="signUp.php">Sign Up</a>
                        </div>
                    </form>
                </div>
                
            </div>
        <?php } ?>
    </div>
</div>