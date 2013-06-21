<?php
    
    class User {
        public $id;
        public $loggedIn;
        public $username;
        public $email;
        public $nickname;
        public $profilePicture;
        public $favoritePictures;
        public $pictures;
        public $highFives;
        
        function __construct($id) {
            $this->id = $id;
        }
        
        function login($username, $password) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;
            
            $user = $collection->findOne(array("username" => $username));
            
            if($user != null){
                if(md5($password) == $user["password"]){
                    $this->loggedIn = true;
                    $this->id = $user["_id"];
                    
                    $this->updateInfo();
                    $conn->close();
                    return "SUCCESS";
                }
            } 
            var_dump($username);
            $_SESSION["errors"]["login"]["username"]["error"] = "Invalid login";
            $conn->close();
            return "FAIL";
        }
        
        private function runUpdateQuery($query) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;

            $collection->update(array("_id" => new MongoId($this->id)), $query);

            $this->updateInfo();

            $conn->close();
        }

        function signUp($username, $email, $password, $confPassword) {
            
            if(filter_var($username, FILTER_SANITIZE_STRING) != $username ||
                $username == "" || trim($username) != $username) 
                    $_SESSION["errors"]["signUp"]["username"]["error"] = "Invalid username";
                    
            if(filter_var($password, FILTER_SANITIZE_STRING) != $password ||
                $password == "" || trim($password) != $password)
                    $_SESSION["errors"]["signUp"]["password"]["error"] = "Invalid password";
                    
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) ||
                $email == "" || trim($email) != $email)
                    $_SESSION["errors"]["signUp"]["email"]["error"] = "Invalid email";
                    
            if($password != $confPassword)
                $_SESSION["errors"]["signUp"]["confPassword"]["error"] = "Passwords do not match";
                
            if(ISSET($_SESSION["errors"]["signUp"])) {
                $_SESSION["errors"]["signUp"]["email"]["value"] = $email;
                $_SESSION["errors"]["signUp"]["username"]["value"] = $username;
                return "FAIL";
            }
            
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;
            
            if($collection->findOne(array("username" => $username)) != null){
                $_SESSION["errors"]["signUp"]["username"]["error"] = "Username already in use";
                $_SESSION["errors"]["signUp"]["email"]["value"] = $email;
                $_SESSION["errors"]["signUp"]["username"]["value"] = $username;
                return "FAIL";
            }
            
            
            $user = array(
                        "username" => $username,
                        "email" => $email,
                        "password" => md5($password),
                        "nick" => $username,
                        "profilePicture" => "default.png",
                        "highFives" => 0,
                        "pictures" => array(),
                        "favoritePictures" => array()
                    );
            
            $collection->insert($user);
            
            $newUser = $collection->findOne(array( "username" => $user["username"]));

            $this->id = $newUser["_id"];
            $this->updateInfo();
            $this->loggedIn = true;
            
            $conn->close();
            
            return "SUCCESS";
        }
        
        function updateInfo() {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;
            $mId = new MongoId($this->id);
            $user = $collection->findOne(array( "_id" => $mId));
            
            $this->username = $user["username"];
            $this->email = $user["email"];
            $this->nickname = $user["nick"];
            $this->profilePicture = $user["profilePicture"];
            $this->highFives = $user["highFives"];
            $this->pictures = $user["pictures"];
            $this->favoritePictures = $user["favoritePictures"];
            
            $conn->close();

        }
        
        function addPicture($pictureId) {
            $query = array('$push' => array("pictures" => $pictureId));
            $this->runUpdateQuery($query);
        }

        function addFavoritPicture($pictureId) {
            $query = array('$push' => array("favoritePictures" => $pictureId));
            $this->runUpdateQuery($query);
        }

        function addHighFive() {
            $query = array( '$inc' => array("highFives" => 1));
            $this->runUpdateQuery($query);
        }

        function changeNick($name) {
            $query = array('$set' => array("nick" => $name));
            $this->runUpdateQuery($query);   
        }
        
        function changeProfilePic($picture) {
            $query = array('$set' => array("profilePicture" => $picture));
            $this->runUpdateQuery($query);   
        }
    }