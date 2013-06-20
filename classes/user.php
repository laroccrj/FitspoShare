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
        
        private function runUpdateQuery($query) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;

            $collection->update(array("_id" => new MongoId($this->id)), $query);

            $this->updateInfo();

            $conn->close();
        }

	function signUp($username, $email, $password, $confPassword) {
            $error = array();
            
            if(filter_var($username, FILTER_SANITIZE_STRING) != $username)
                $error[] = "Invalid username";
            if(filter_var($password, FILTER_SANITIZE_STRING) != $password)
                $error[] = "Invalid password";
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                $error[] = "Invalid email";
            if($password != $confPassword)
                $error[] = "Passwords do not match";
            if(count($error) > 0)
                return $error;
            
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;
            
            if($collection->findOne(array("username" => $username)) != null){
                $error[] = "Username already in use";
                return $error;
            }
            
            
            $user = array(
                        "username" => $username,
                        "email" => $email,
                        "password" => $password,
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