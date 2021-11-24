<?php
require_once "include_db.php";

$name = htmlspecialchars($_GET['name']);
$description = htmlspecialchars($_GET['description']);
$title = htmlspecialchars($_GET['title']);
$dates = htmlspecialchars($_GET['dates']);

$query = "SELECT halls.title, paintings.id_halls, paintings.name, paintings.img_path, paintings.description, paintings.dates FROM paintings INNER JOIN halls ON paintings.id_halls = halls.id";

if ((isset($_GET['name'])) || (isset($_GET['title'])) || (isset($_GET['description'])) || (isset($_GET['dates']))){
    $check = false;
    if($name != ''){
        $query .= " WHERE name LIKE '%" . $name . "%'";
        $check = true;
    }
    if ($title != "0") {
        if ($check) {
            $query .= " AND paintings.id_halls = '" . $title . "'";
        } else {
            $query .= " WHERE paintings.id_halls = '" . $title . "'";
        }
        $check = true;
    }
    if($description != ''){
        if ($check) {
            $query .= " AND description LIKE '%" . $description . "%'";
        } else {
            $query .= " WHERE description LIKE '%" . $description . "%'";
        }
       
        $check = true;
    }
    if ($dates != "") {
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

$result = $mysql->prepare($query);
$result->execute();
$i = 0;
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $i++;
    echo "<tr><th scope='row'><img src='get_image.php?img=" . $row["img_path"] . "' width='200' alt=''></th>
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