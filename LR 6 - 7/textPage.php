<?php
require_once "header.php";
require_once "logic/textLogic.php";
?>

<div class="container text-center">
    <h2>
        Обработка текста
    </h2>
    <form action="textPage.php" method="post">
        <textarea name="text" id="" cols="30" rows="10"><?=$text?></textarea>
        <div>
            <button class="btn btn-primary">
                Обработать
            </button>
        </div>
    </form>


    <div class="mt-3 text-start">

        <p>Задание 1</p>
        <div>
            <?=$analyze->Task1()?>
        </div>
        <p>Задание 9</p>
        <div>
            <?=$analyze->Task9()?>
        </div>
        <p>Задание 10</p>
        <div>
            <?=$analyze->Task10()?>
        </div>
        <p>Задание 14</p>
        <div>
            <?=$analyze->Task14()?>
        </div>

        <div>
            <?=$analyze->viewText()?>
        </div>
    </div>
</div>
