<?php
require_once "include_db.php";
$msg = '';
if (isset($_POST['create'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $title = htmlspecialchars($_POST['title']);
    $dates = htmlspecialchars($_POST['dates']);
    $img_path = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_name, "./images/" . $img_path);

    if (empty($name) || empty($description) || empty($title) || empty($dates) || empty($img_path)) {
        $msg = "Введены некорректные данные";
    } else {
        $id = uniqid();
        $result = $mysql->prepare("INSERT INTO paintings (id, img_path, name, id_halls, description, dates) VALUES (:id, :img_path, :name, :id_halls, :description, :dates)");
        $result->execute([
            ':id' => $id,
            'img_path' => $img_path,
            ':name' => $name,
            ':id_halls' => $title,
            ':description' => $description,
            'dates' => $dates
        ]);
        header('Location: crud.php');
    }

}

if (isset($_POST['update'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $title = htmlspecialchars($_POST['title']);
    $dates = htmlspecialchars($_POST['dates']);
    $img_path = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_name, "./images/" . $img_path);
    $id = htmlspecialchars($_GET['id']);
    if (empty($img_path) || empty($tmp_name)) {
        if (empty($name) || empty($description) || empty($dates) || $title == "0") {
            $msg = "Введены некорректные данные";
        } else {
            $query = $mysql->prepare("UPDATE paintings SET name=:name, description=:description, dates=:dates, id_halls=:title WHERE id=:id");
            $query->execute([
                ':name' => $name,
                ':description' => $description,
                ':dates' => $dates,
                ':title' => $title,
                ':id' => $id
            ]);
            header('Location: crud.php');
        }
    } else if (empty($name) || empty($description) || empty($dates) || $title == "0") {
        $msg = "Введены некорректные данные";
    } else {
        $query = $mysql->prepare("UPDATE paintings SET name=:name, description=:description, dates=:dates, id_halls=:title, img_path=:img_path WHERE id=:id");
        $query->execute([
            ':name' => $name,
            ':description' => $description,
            ':dates' => $dates,
            ':title' => $title,
            ':id' => $id,
            ':img_path' => $img_path
        ]);
        header('Location: ./crud.php');
    }
}

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_GET['id']);
    $query = $mysql->prepare("DELETE FROM paintings WHERE id=:id");
    $query->execute([
        ':id' => $id
    ]);
    header('Location: ./crud.php');
}

$sql = $mysql->prepare("SELECT halls.title, paintings.id, paintings.name, paintings.img_path, paintings.description, paintings.dates FROM paintings INNER JOIN halls ON paintings.id_halls = halls.id");
$sql->execute();
$result = $sql->fetchAll();

if (array_key_exists('id', $_GET)) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql = $mysql->prepare("SELECT * FROM paintings WHERE id=:id");
$sql->execute([
    ':id' => $id
]);

$res = $sql->fetchAll();

?>