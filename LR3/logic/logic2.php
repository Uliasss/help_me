<?php
require_once "include_db.php";

$query = "SELECT halls.id, halls.title FROM halls";
$result = $mysql->prepare($query);
$result->execute();
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $attr = ($_SESSION['title'] == $row["id"]) ? 'selected' : '';
    echo "<option value='" . $row["id"] . "'" . $attr . ">". $row["title"] . "</option>";
}

?>