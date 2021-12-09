<?php

require_once "logic/crud_func.php";
require_once "header.php";
?>

<div class="container">
    <h2>Обновление элемента</h2>
    <form action="crud_update.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
        <div class="form-group mt-4">
            <label for="exampleInput">Загрузите картинку</label>
            <input type="file" class="form-control" name="img">
        </div>
        <?php foreach ($res as $val) { ?>
        <div class="form-group mt-4">
            <label for="exampleInput">Название</label>
            <input type="text" class="form-control" placeholder="Название" value="<?=$val['name']?>" name="name">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInput">Описание</label>
            <input type="text" class="form-control"  placeholder="Описание" value="<?=$val['description']?>" name="description">
        </div>
        <div class="mt-4">
            <select name="title" class="form-control">
                <option value="0" selected>Выберите зал</option>
                <?php
                require "logic/logic2.php";
                ?>
            </select>
        </div>
        <div class="my-3">
            <div class="mb-3">
                Дата написания:
            </div>
            <input type="date" class="form-control" value="<?=$val['dates']?>"  name="dates"/>
        </div>
        <?php } ?>
        <div>
            <p class="err">
                <?=$msg?>
            </p>
        </div>
        <div class="my-4">
            <input type="submit" value="Добавить" name="update" class="btn btn-primary">
            <a href="crud.php" class="btn btn-danger">
                Отмена
            </a>
        </div>
</div>
