<?php
    require "logic/include_db.php";

    if (isset($_POST['myActionName'])){
        $result = $mysql->prepare("SELECT * FROM paintings");
        $result->execute();
        $data_attay = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data_attay[] = array(
                'name' => $row['name'],
                'description' => $row['description'],
                'dates' => $row['dates'],
                'id_halls' => $row['id_halls'],
                'img_path' => $row['img_path']
            );
        }
        
        $file_name = "gallery.json";
        $json = json_encode($data_attay,JSON_UNESCAPED_UNICODE);

        header('Content-disposition: attachment; filename=gallery.json');
        header('Content-type: application/json');
        echo $json;
       
    }   
    ?>