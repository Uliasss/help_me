<?php

require_once "logic/crud_func.php";
require_once "header.php";

?>

<div class="container text-center">
    <h2>Создание элемента</h2>
    <form action="crud_create.php" method="post" enctype="multipart/form-data">
        <div class="form-group mt-4">
            <label for="exampleInput">Загрузите картинку</label>
            <input type="file" class="form-control" name="img">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInput">Название</label>
            <input type="text" class="form-control" placeholder="Название" name="name">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInput">Описание</label>
            <input type="text" class="form-control"  placeholder="Описание" name="description">
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
            <input type="date" class="form-control"  name="dates"/>
        </div>
        <div>
            <p class="err">
                <?=$msg?>
            </p>
        </div>
        <div class="my-4">
            <input type="submit" value="Добавить" name="create" class="btn btn-primary">
            <a href="crud.php" class="btn btn-danger">
                Отмена
            </a>
        </div>
    </form>
</div>
