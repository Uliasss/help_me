<?php
session_start();
if($_SESSION['user']){
    echo '<div class="h3 text-center"> Добро пожаловать '. $_SESSION['user'] .'</div>
<div class="text-center">
<a href="logic/signout.php">Выйти</a>
</div>';
}
else{
    echo '<div class="h3 text-end">
                    Вы не авторизованы
                </div>
                <div class="text-end">
                    <a href="login.php">
                        Войти
                    </a>
                </div>
                <div class="text-end">
                    <a href="registration.php">
                        Зарегистрироваться
                    </a>
                </div>';
}




?>