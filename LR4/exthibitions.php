
<?php
session_start();
require_once "header.php";
?>

    <main class="main">

        <div class="container mb-5">
            <?php
            require_once "session.php";
            if($_SESSION['user']){

                echo "<a href='filter.php'> Секретная страница </a>";
            }
            ?>

            <div>
                <a href="textPage.php">Обработка текста</a>
            </div>
            <div>
                <a href="dataPage.php">Импорт и экспорт данных</a>
            </div>
            <div>
                <a href="crud.php">CRUD</a>
            </div>
        </div>

        <!-- <div class="event" style="background-image: url(images/jesus.jpg);">
            <div class="container">
                <div class="hashtag">
                    #Уже идет
                </div>
                <div class="event-text">
                    Александр Иванов. Библейские эскизы. Чудеса и проповеди Христа
                </div>
                <div class="event-date">
                    18 июня 2021 — 14 ноября 2021
                </div>
                <div class="event-bottom d-flex justify-content-between">
                    <div class="btn btn-secondary">
                        Купить билет
                    </div>
                    <div class="event-age text-center border rounded-circle">
                        16+
                    </div>
                </div>
            </div>
        </div>
        <div class="signature-event text-center">
            А.А. Иванов. Христос проповедует на портике храма («Иерусалим, Иерусалим, избивающий пророков и камнями
            побивающий посланных к тебе!»). Конец 1840-х – 1858. ГТГ
        </div> -->

        <div class="info d-flex container">

            <div class="col-4">
                <div class="h3">
                    Адрес и часы работы
                </div>
                <div class="info-text">
                    Историческое здание, Лаврушинский переулок, д. 10
                </div>
                <div class="info-text">
                    8 (495) 957-07-27
                </div>
                <div class="info-text">
                    ВС, ВТ, СР: 10:00 — 18:00 (кассы до 17:00)
                    ПН: выходной
                    ЧТ, ПТ, СБ: 10:00 — 21:00 (кассы до 20:00)
                </div>
                <div class="info-text-brown">
                    Сегодня выходной
                    Завтра 10:00 — 18:00 (кассы до 17:00)
                </div>
            </div>
            <div class="col-4">
                <div class="h3">
                    Билеты
                </div>
                <ul>
                    <li>
                        Взрослые — 500 ₽
                    </li>
                    <li>
                        Льготные — 0, 250, 300 ₽
                    </li>
                </ul>
                <div class="btn btn-secondary">
                    Купить билет
                </div>
                <div class="info-text">
                    Присоединяйтесь к индивидуальной программе лояльности «Друзья Третьяковской галереи» и посещайте все
                    выставки музея без очереди и без билета в течение года.
                </div>
                <div class="btn btn-danger">
                    Cтать другом
                </div>
            </div>
            <div class="col-4">
                <div class="h3">
                    Требования и сервисы
                </div>
                <div class="info-text-brown">
                    Ответы на частые вопросы
                </div>
                <div class="info-text-brown">
                    Правила посещения
                </div>
                <div class="info-text-brown">
                    Доступный музей
                </div>
            </div>
        </div>
        <div class="event-nav">
            <div class="container d-flex justify-content-between">
                <div class="event-nav-inner d-flex">
                    <div class="description me-3">
                        <a href="#">Описание</a>
                    </div>
                    <div class="photo">
                        <a href="#">Фото / экспонаты</a>
                    </div>
                </div>
                <div class="btn">
                    Купить билет
                </div>
            </div>
        </div>
        <div class="content container">
            Третьяковская галерея — эксклюзивный обладатель графического наследия Александра Андреевича Иванова
            (1806–1858), включающего в себя более 700 самостоятельных листов и около 40 альбомов. Полнота собрания
            позволяет сформировать несколько сменяющих друг друга экспозиций, каждая из которых имеет характер
            мини-выставки. «Чудеса и проповеди Христа» — выставка, продолжающая показ графического цикла «Библейские
            эскизы», работе над которым художник отдал последнее десятилетие своей жизни — с конца 1840-х до начала 1858
            года. 
        </div>
        <div class="content-bottom text-center">
            <div class="content-btn btn">
                Читать далее
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