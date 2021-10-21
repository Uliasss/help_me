<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'exhibition');
  
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset("utf8");

$query = "SELECT halls.id, halls.title FROM halls";
$result = $mysql->query($query);
while($row = $result->fetch_assoc()){
    $attr = ($_SESSION['title'] == $row["id"]) ? 'selected' : '';
    echo "<option value='" . $row["id"] . "'" . $attr . ">". $row["title"] . "</option>";
}

?>