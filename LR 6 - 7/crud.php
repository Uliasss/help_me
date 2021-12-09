<?php
error_reporting(0);
require_once "header.php";
require_once "logic/crud_func.php";
require_once "logic/include_db.php";
?>
<div class="container">
    <div>
        <a href="crud_create.php" class="btn btn-primary">Добавить запись</a>
    </div>
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">Изображение</th>
            <th scope="col">Наименование</th>
            <th scope="col">Зал</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата написания</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <?php foreach ($result as $value) { ?>
            <tr>
                <td><img src='images/<?=htmlspecialchars($value['img_path']);?>' width='200px'></td>
                <td><?=htmlspecialchars($value['name']); ?></td>
                <td><?=htmlspecialchars($value['title']); ?></td>
                <td><?=htmlspecialchars($value['description']); ?></td>
                <td><?=htmlspecialchars($value['dates']); ?></td>
                <td>
                    <a href="crud_update.php?id=<?=$value['id']?>" name="update" class="btn btn-success">Обновить</a>
                    <p>&nbsp;</p>
                    <a href="crud_delete.php?id=<?=$value['id']?>" name="delete" class="btn btn-danger">Удалить</a>
                    </form>
                </td>
            </tr> <?php } ?>
        </tbody>
    </table>
</div>

