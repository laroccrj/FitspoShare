<?php

class Counter {
    
    public $name;
    
    function __construct($name) {
        $this->name = $name;
    }
    
    function updateQuery($query) {
        $conn = new Mongo();
        $db = $conn->fitspo;
        $collection = $db->counters;

        $collection->update(array("name" => $this->name), $query);

        $conn->close();
    }
    
    function getCount() {
        $conn = new Mongo();
        $db = $conn->fitspo;
        $collection = $db->counters;

        $counter = $collection->findOne(array("name" => $this->name));
        
        $conn->close();
        
        return $counter["count"];
    }
    
    function getNext() {
        $query = array( '$inc' => array("count" => 1));
        $this->updateQuery($query);
        return $this->getCount();
    }
    
}

