<?php
    require_once "logic/include_db.php";
    if(!$_SESSION['user']){
        header("Location: index.php");
    }

$_SESSION["dates"] = $_GET["dates"];
$_SESSION["name"] = $_GET["name"];
$_SESSION["description"] = $_GET["description"];
$_SESSION["title"] = $_GET["title"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Организация дня рождения или юбилея в Волгограде</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
<?php
require_once "header.php";
?>
    <main class="main container" >
        <div class="container">
            <form action="filter.php" class="text-center" method="get">

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
                        require "logic/logic2.php";
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
            <form action="filter.php" class="text-center pt-2">
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
                require "logic/logic.php";
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </main>
<?php
require_once "footer.php";
?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
</body>

</html>