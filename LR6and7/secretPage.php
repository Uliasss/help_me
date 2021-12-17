<?php
$_SESSION["dates"] = $_GET["dates"];
$_SESSION["name"] = $_GET["name"];
$_SESSION["description"] = $_GET["description"];
$_SESSION["title"] = $_GET["title"];

?>
<div class="container">
    <form action="exthibitions.php" class="text-center" method="get">

        <h2>
            Фильтрация результата поиска
        </h2>
        <div class="my-3">
            <div class="mb-3">
                По дате написания:
            </div>
            <input type="date" class="form-control" value="<?=$_SESSION["dates"]?>"  name="dates"/>
        </div>

        <div class="mb-3">
            <div class="mb-3">
                Фильтрация по ресторану:
            </div>
            <select name="title" class="form-control">
                <option value="0" selected>Выберите зал</option>
                <?php
                require_once "logic/logic2.php";
                ?>
            </select>
        </div>


        <div class="mb-3">
            <div class="mb-3">
                По описанию:
            </div>
            <textarea name="description"  placeholder="Введите описание" class="form-control"><?=$_SESSION["description"]?></textarea>
        </div>

        <div class="mb-3">
            <div class="mb-3">
                По названию:
            </div>
            <input type="text" name="name" placeholder="Введите название картины" value="<?= $_SESSION["name"]?>" class="form-control">
        </div>

        <input type="submit" value="Применить фильтр" name="filter" class="btn btn-primary">
    </form>
    <form action="exthibitions.php" class="text-center pt-2">
        <input type="submit" value="Очистить фильтр" name="clearFilter" class="btn btn-secondary">
    </form>
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">Изображение</th>
            <th scope="col">Наименование</th>
            <th scope="col">Зал</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата написания</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "logic/logic.php";
        ?>
        </tbody>
    </table>
</div>