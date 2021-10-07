<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'exhibition');

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset("utf8");

$query = "SELECT halls.title, paintings.id_halls, paintings.name, paintings.img_path, paintings.description, paintings.dates FROM paintings INNER JOIN halls ON paintings.id_halls = halls.id";

// $query2 = "SELECT paintings.dates FROM paintings";
// $date = $mysql->query($query2);
// while ($dates = $date->fetch_assoc()) {
//     var_dump($dates);
// }   
if ((isset($_GET['name'])) || (isset($_GET['title'])) || (isset($_GET['description'])) || (isset($_GET['dates']))){
    $check = false;
    if($_GET['name'] != ''){
        $query .= " WHERE name LIKE '%" . mysqli_real_escape_string($mysql,$_GET["name"]) . "%'";
        $check = true;
    }
    if ($_GET["title"] != "0") {
        if ($check) {
            $query .= " AND paintings.id_halls = '" . mysqli_real_escape_string($mysql,$_GET["title"]) . "'";
        } else {
            $query .= " WHERE paintings.id_halls = '" . mysqli_real_escape_string($mysql,$_GET["title"]) . "'";
        }
        $check = true;
    }
    if($_GET['description'] != ''){
        if ($check) {
            $query .= " AND description LIKE '%" . mysqli_real_escape_string($mysql,$_GET["description"]) . "%'";
        } else {
            $query .= " WHERE description LIKE '%" . mysqli_real_escape_string($mysql,$_GET["description"]) . "%'";
        }
       
        $check = true;
    }
    if ($_GET["dates"] != "") {
            // if ($check) {
            //     while ($dates = $date->fetch_assoc()) {
            //         $query .= " AND $dates = " . $_GET["dates"];
            //     } 
                
            // } else {
            //     while ($dates = $date->fetch_assoc()) {
            //         $query .= " WHERE $dates = " . $_GET["dates"];
            //     } 
            // }
            $check = true;
    }
}

$result = $mysql->query($query);
$i = 0;
while ($row = $result->fetch_assoc()) {
    $i++;
    echo "<tr><th scope='row'><img src='images/" . $row["img_path"] . "' width='200' alt=''></th>
                            <td>" . $row['name'] . "</td>
                            <td>". $row['title'] ."</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['dates'] . "</td>
                        </tr>";
}
if ($i == 0) {
    echo "Ничего не найдено";
}
?>