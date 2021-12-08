<?php
require_once "logic/crud_func.php";
require_once "header.php";
?>
<div class="container text-center">
    <form action="crud_delete.php?id=<?=$_GET['id']?>" method="post">
        <h2>
            Удаление элемента
        </h2>
        <p>
            Вы уверены, что хотите удалить данный элемент?
        </p>
        <div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Изображение</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Зал</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Дата написания</th>
                </tr>
                </thead>
                <tr>
                    <?php foreach ($res as $val) { ?>
                        <td><img src='images/<?=htmlspecialchars($val['img_path']);?>' width='200px'></td>
                        <td><?=htmlspecialchars($val['name']); ?></td>
                        <td>
                            <?php
                            $result = $mysql->prepare("SELECT halls.title FROM halls WHERE halls.id=:id");
                            $result->execute([
                                ':id' => $val['id_halls']
                            ]);
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                echo $row['title'];
                            }
                            ?>
                        </td>
                        <td><?=htmlspecialchars($val['description']); ?></td>
                        <td><?=htmlspecialchars($val['dates']); ?></td>
                    <?php } ?>
                </tr>
            </table>

        </div>
        <input type="submit" value="Да!!!" name="delete" class="btn btn-danger">
        <a href="crud.php" class="btn btn-secondary">
            Нет...
        </a>
    </form>

</div>
