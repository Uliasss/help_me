<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Третьяковская галерея</title>
</head>

<body>
<header class="header container">
    <div class="d-flex justify-content-between">
        <a class="brand" href="exthibitions.php">
            Третьяковская галерея
        </a>
        <ul class="header-top nav">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Купить билет
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Стать другом
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Интернет-магазин
                </a>
            </li>
        </ul>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Посетителям
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Здания и часы работы</a></li>
                    <li><a class="dropdown-item" href="#">Билеты, льготы и бесплатные дни</a></li>
                    <li><a class="dropdown-item" href="#">Экскурсии</a></li>
                    <li><a class="dropdown-item" href="#">Контакты и отзывы</a></li>
                    <li><a class="dropdown-item" href="#">Правила посещения</a></li>
                    <li><a class="dropdown-item" href="#">Преподавателям</a></li>
                    <li><a class="dropdown-item" href="#">Самостоятельные занятия</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Выставки
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <li><a class=" dropdown-item" href="#">Текущие выставки</a></li>
                    <li><a class="dropdown-item" href="#">Будущие выставки</a></li>
                    <li><a class="dropdown-item" href="#">Архив выставок</a></li>
                    <li><a class="dropdown-item" href="#">Внешние выставки</a></li>
                    <li><a class="dropdown-item" href="#">Постоянные экспозиции</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    События
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                    <li><a class="dropdown-item" href="#">Презентация</a></li>
                    <li><a class="dropdown-item" href="#">Лекции</a></li>
                    <li><a class="dropdown-item" href="#">Концерты и спектакли</a></li>
                    <li><a class="dropdown-item" href="#">Для друзей музея</a></li>
                    <li><a class="dropdown-item" href="#">Архив событий</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Кино
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                    <li><a class="dropdown-item" href="#">Фильмы в прокате</a></li>
                    <li><a class="dropdown-item" href="#">Кинопрограммы</a></li>
                    <li><a class="dropdown-item" href="#">Архив кино</a></li>
                    <li><a class="dropdown-item" href="#">Все фильмы</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Образование
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                    <li><a class="dropdown-item" href="#">Творческие занятия</a></li>
                    <li><a class="dropdown-item" href="#">Программы к выставкам</a></li>
                    <li><a class="dropdown-item" href="#">Лекции</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Колллекция
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                    <li><a class="dropdown-item" href="#">Наука</a></li>
                    <li><a class="dropdown-item" href="#">Издания</a></li>
                    <li><a class="dropdown-item" href="#">Сувениры</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Поддержать музей
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <li><a class="dropdown-item" href="#">Сделать пожертвование</a></li>
                    <li><a class="dropdown-item" href="#">Стать другом Третьяковки</a></li>
                    <li><a class="dropdown-item" href="#">Стать волонтером</a></li>
                    <li><a class="dropdown-item" href="#">Корпоративная программа</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton8" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    Третьяковка онлайн
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton8">
                    <li><a class="dropdown-item" href="#">Моя Третьяковка</a></li>
                    <li><a class="dropdown-item" href="#">Лаврус</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="dropdown">
                <a class="header-dropdown" type="button" id="dropdownMenuButton9" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    О музее
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton9">
                    <li><a class="dropdown-item" href="#">Ответы на частые вопросы</a></li>
                    <li><a class="dropdown-item" href="#">Миссия музея</a></li>
                    <li><a class="dropdown-item" href="#">История</a></li>
                    <li><a class="dropdown-item" href="#">Третьяковка от первого лица</a></li>
                    <li><a class="dropdown-item" href="#">Научная жизнь</a></li>
                    <li><a class="dropdown-item" href="#">Издания</a></li>
                    <li><a class="dropdown-item" href="#">Проекты</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
</header>