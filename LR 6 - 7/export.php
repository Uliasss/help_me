<?php 
    require "logic/include_db.php";
    require_once "header.php";
?>

    <form class="container text-center" method="POST" action="exportLogic.php" >

        <div class="container">
            <h2>Экспорт JSON Файла</h2>
        </div>
        <input name="myActionName" class="btn btn-primary" type="submit" value="Экспорт" />
    </form>
</body>
</html>