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
        
        function signUp($username, $email, $password, $confPassword) {
            //TODO: Error checking
            
            //If we don't have errors, let's sign up!
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;
            
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
            
            $insertedUser = $collection->findOne(array( "username" => $user["username"]));

            $this->id = $insertedUser["_id"];
            $this->updateInfo();
            $this->loggedIn = true;
            
            $conn->close();
        }
        
        function updateInfo() {
            //TODO: get user information and apply it to variables
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
            $query = array("_id" => new MongoId($this->id), "$push" => 
                    array("pictures" => $pictureId));
            
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users;
            
            $collection->update($query);
            
            $this->updateInfo();
            
            $conn->close();
        }
    }