<?php
    
    $conn = new Mongo();
    $db = $conn->fitspo;
    $collection = $db->uploads;

    $uploads = $collection->find(array("date" => array('$gt' => (int)date("U") - 604800)))->sort(array("highFives" => -1))->limit(12);
    //var_dump($uploads);
    
    
    //$uploads = $collection->find();
    
    foreach ($uploads as $value) {
        if(strlen($value["title"]) > 20) {
            $title = "";
            for($i = 0; $i < 20; $i++){
                $title .= $value["title"][$i];
            }
            $title .= "...";
        } else {
            $title = $value["title"];
        }
        ?>
            <a href="viewUpload.php?upload=<?php echo $value["_id"]; ?>">
            <div class="upload">
                <h1><?php echo $title; ?></h1>
                <div class="image">
                    <img src="images/uploads/<?php echo $value["path"]; ?>">
                </div>
            </div>
            </a>
        <?php
    }
    
    $conn->close();