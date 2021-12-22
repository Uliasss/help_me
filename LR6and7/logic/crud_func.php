<?php
require_once "include_db.php";
class CRUD{
    public function Create($mysql, $data){
        move_uploaded_file($data['tmp_name'], "./images/" . $data['img_path']);
        if (empty($data['name']) || empty($data['description']) || empty($data['title']) || empty($data['dates']) || empty($data['img_path'])) {
            $msg = "Введены некорректные данные";
        } else {
            $id = uniqid();
            $query = $mysql->prepare("INSERT INTO paintings (id, img_path, name, id_halls, description, dates) VALUES (:id, :img_path, :name, :id_halls, :description, :dates)");
            $query->execute([
                ':id' => $id,
                ':img_path' => $data['img_path'],
                ':name' => $data['name'],
                ':id_halls' => $data['title'],
                ':description' => $data['description'],
                ':dates' => $data['dates']
            ]);
            header('Location: ./crud.php');
        }
    }
    public function Update($mysql, $data, $id){
        move_uploaded_file($data['tmp_name'], "./images/" . $data['img_path']);
        if (empty($data['img_path']) || empty($data['tmp_name'])) {
            if (empty($data['name']) || empty($data['description']) || empty($data['dates']) || $data['title'] == "0") {
                $msg = "Введены некорректные данные";
            } else {
                $query = $mysql->prepare("UPDATE paintings SET name=:name, description=:description, dates=:dates, id_halls=:title WHERE id=:id");
                $query->execute([
                    ':name' => $data['name'],
                    ':description' => $data['description'],
                    ':dates' => $data['dates'],
                    ':title' => $data['title'],
                    ':id' => $id
                ]);
                header('Location: crud.php');
            }
        } else if (empty($data['name']) || empty($data['description']) || empty($data['dates']) || $data['title'] == "0") {
            $msg = "Введены некорректные данные";
        } else {
            $query = $mysql->prepare("UPDATE paintings SET name=:name, description=:description, dates=:dates, id_halls=:title, img_path=:img_path WHERE id=:id");
            $query->execute([
                ':name' => $data['name'],
                ':description' => $data['description'],
                ':dates' => $data['dates'],
                ':title' => $data['title'],
                ':id' => $id,
                ':img_path' => $data['img_path']
            ]);
            header('Location: ./crud.php');
        }
    }
    public function Delete($mysql, $id){
        $query = $mysql->prepare("DELETE FROM paintings WHERE id=:id");
        $query->execute([
            ':id' => $id
        ]);
        header('Location: ./crud.php');
    }
    public function View($mysql){
        if (array_key_exists('id', $_GET)) {
            $id = $_GET['id'];
            $sql = $mysql->prepare("SELECT * FROM paintings WHERE id=:id");
            $sql->execute([
                ':id' => $id
            ]);
            return $sql->fetchAll();
        } else {
            $id = '';
            return 0;
        }
    }
    public function Read($mysql){
        $sql = $mysql->prepare("SELECT halls.title, paintings.id, paintings.name, paintings.img_path, paintings.description, paintings.dates FROM paintings INNER JOIN halls ON paintings.id_halls = halls.id");
        $sql->execute();
        return $sql->fetchAll();
    }
}



?>