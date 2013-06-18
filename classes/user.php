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
        
        function __construct() {
            $this->$id = null;
            $this->$loggedIn = false;
        }
        
        function __construct($id) {
            $this->$id = $id;
        }
        
        function signUp($username, $email, $password, $confPassword) {
            //TODO: Error checking
            
            //If we don't have errors, let's sign up!
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->users; 
        }
        
        function updateInfo() {
            //TODO: get user information and apply it to variables
        }
    }