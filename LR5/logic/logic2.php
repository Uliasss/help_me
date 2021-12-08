<?php
require_once "include_db.php";

$query = "SELECT halls.id, halls.title FROM halls";
$result = $mysql->prepare($query);
$result->execute();
$title = '';
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $attr = ($val['id_halls'] == $row["id"]) ? 'selected' : '';
    echo "<option value='" . $row["id"] . "'" . $attr . ">". $row["title"] . "</option>";
    if($val['id_halls'] == $row["id"]) {
        $title = $row['title'];
        var_dump($title);
    }
}


?>