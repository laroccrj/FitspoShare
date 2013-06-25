<?php
    
    class Picture {
        public $id;
        public $authorId;
        public $title;
        public $highFives;
        public $views;
        public $favorites;
        public $date;
        public $comments;
        public $name;
        public $replies;
        
        function __construct($id) {
            $this->id = $id;
            
            if($id != NULL)
                $this->updateInfo ();
        }
        
        private function runUpdateQuery($query) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->pictures;

            $collection->update(array("_id" => new MongoId($this->id)), $query);

            $this->updateInfo();

            $conn->close();
        }

        function newPicture($userId, $title, $name) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->pictures;
            
            $picture = array(
                        "authorId" => $userId,
                        "title" => $title,
                        "highFives" => 0,
                        "views" => 0,
                        "favorites" => 0,
                        "date" => date("U"),
                        "comments" => array(),
                        "name" => $name,
                        "replies" => array()
                    );
            
            $collection->insert($picture);
            
            $newPicture = $collection->findOne(array( "name" => $picture["name"]));

            $this->id = $newPicture["_id"];
            $this->updateInfo();
            
            $conn->close();
        }
        
        function updateInfo() {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->pictures;
            $mId = new MongoId($this->id);
            $picture = $collection->findOne(array( "_id" => $mId));
            
            $this->authorId = $picture["authorId"];
            $this->title = $picture["title"];
            $this->highFives = $picture["highFives"];
            $this->views = $picture["views"];
            $this->favorites = $picture["favorites"];
            $this->date = $picture["date"];
            $this->comments = $picture["comments"];
            $this->name = $picture["name"];
            $this->replies = $picture["replies"];
            
            $conn->close();

        }
        
        function addComment($id, $comment) {
            $comment = array(
                "number" => count($this->comments),
                "userId" => $id,
                "comment" => $comment,
                "date" => date("U"),
            );
            $query = array('$push' => array("comments" => $comment));
            $this->runUpdateQuery($query);
        }
        
        function addReply($id, $replyTo, $comment) {
            $comment = array(
                "userId" => $id,
                "comment" => $comment,
                "reply" => $replyTo,
                "date" => date("U")
            );
            $query = array('$push' => array("replies" => $comment));
            $this->runUpdateQuery($query);
        }
        
        function addFavorite() {
            $query = array( '$inc' => array("favorites" => 1));
            $this->runUpdateQuery($query);
        }

        function addHighFive() {
            $query = array( '$inc' => array("highFives" => 1));
            $this->runUpdateQuery($query);
        }
        
        function addView() {
            $query = array( '$inc' => array("views" => 1));
            $this->runUpdateQuery($query);
        }

        
    }