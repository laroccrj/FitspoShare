<?php
    include 'counter.php';
    
    class Upload {
        public $id;
        public $authorId;
        public $title;
        public $highFives;
        public $views;
        public $favorites;
        public $date;
        public $comments;
        public $type;
        public $path;
        public $replies;
        public $number;
        
        function __construct($id) {
            $this->id = $id;
            
            if($id != NULL)
                $this->updateInfo();
        }
        
        private function runUpdateQuery($query) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->uploads;

            $collection->update(array("_id" => new MongoId($this->id)), $query);

            $this->updateInfo();

            $conn->close();
        }

        function newUpload($userId, $title, $path, $type) {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->uploads;
            
            $counter = new Counter("uploads");
            $number = $counter->getNext();
            
            $upload = array(
                        "authorId" => $userId,
                        "title" => $title,
                        "highFives" => 0,
                        "views" => 0,
                        "favorites" => 0,
                        "date" => (int)date("U"),
                        "comments" => array(),
                        "type" => $type,
                        "path" => $path,
                        "replies" => array(),
                        "number" => $number
                    );
            
            $collection->insert($upload);
            
            $newUpload = $collection->findOne(array( "number" => $upload["number"]));

            $this->id = $newUpload["_id"];
            $this->updateInfo();
            
            $conn->close();
        }
        
        function updateInfo() {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->uploads;
            $mId = new MongoId($this->id);
            $upload = $collection->findOne(array( "_id" => $mId));
            
            $this->authorId = $upload["authorId"];
            $this->title = $upload["title"];
            $this->highFives = $upload["highFives"];
            $this->views = $upload["views"];
            $this->favorites = $upload["favorites"];
            $this->date = $upload["date"];
            $this->comments = $upload["comments"];
            $this->type = $upload["type"];
            $this->path = $upload["path"];
            $this->replies = $upload["replies"];
            $this->number = $upload["number"];
            
            $conn->close();

        }
        
        function getPrevId() {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->uploads;
            $prev = null;
            $found = false;
            
            $same = $collection->find(array("highFives" => $this->highFives));
            
            while($same->hasNext() && !$found) {
                $doc = $same->getNext();
                if($doc["_id"] != $this->id)
                    $prev = $doc;
                else
                    $found = true;
            }
            

            
            if($prev === null)
                $prev = $collection->findOne(array("highFives" => array('$gt' => $this->highFives)));
            
            $conn->close();
            
            return $prev["_id"];
        }
        
        function getNextId() {
            $conn = new Mongo();
            $db = $conn->fitspo;
            $collection = $db->uploads;
            $next = null;
            $found = false;
            
            $same = $collection->find(array("highFives" => $this->highFives));
            
            while($same->hasNext() && !$found) {
                $doc = $same->getNext();
                if($doc["_id"] == $this->id)
                    $found = true;
            }
            
            if($found && $same->hasNext())
                $next = $same->getNext();
            
            if($next === null)
                $next = $collection->findOne(array("highFives" => array('$lt' => $this->highFives)));
            
            $conn->close();
            
            return $next["_id"];
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