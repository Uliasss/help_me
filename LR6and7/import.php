
<?php
error_reporting(0);
require "header.php";
?>
    <form class="container" method="POST" action="">
        <div class="container">
            <h2>Импорт JSON Файла</h2>
        </div>
        <input name="fileName" class="form-control" type="text" placeholder="files/gallery.json" />
        <div class="text-center my-4">
            <input name="myActionName " class="btn btn-primary" type="submit" value="Импорт" />
        </div>
    </form>
    <?php
        require "logic/include_db.php";

        if (isset($_POST['fileName'])){
            $url = $_POST['fileName'];
            if(file_exists($url)){
                $handle = fopen($url, "r");
                $contents = fread($handle, filesize($url));
                $arr = json_decode($contents,true);
                if($arr){
                    $check = false;
                    $arrOfKeys = array();
                    $queryArray = array();
                    foreach ($arr as $index => $value){
                        $j = 0;
                        $str = '';
                        foreach($value as $key => $el){
                            if($index == 0){
                                $arrOfKeys[] = $key;
                            }else{
                                if($arrOfKeys[$j] != $key){
                                    $check = true;
                                }
                            }
                            if($j == 0){
                                $str.="VALUES ('$el'";
                            }else{
                                $str.=", '$el'";
                            }
                            $j++;
                        }
                        $queryArray[] = $str.')';
                    }
                    if($check){
                        echo 'невалидно для создание таблицы';
                    }else{
                        $strCreateTable = "";
                        $strInsertIntoTable = '';
                        $i = 0;
                        $name = explode(".", basename($url));
                        foreach ($arrOfKeys as $el){
                            if($i == 0){
                                $strCreateTable.=" CREATE TABLE gallery_imported ($el varchar(255) ";
                                $strInsertIntoTable.= "INSERT INTO $name[0]_imported ( $el";
                            }else{
                                $strCreateTable.=", $el varchar(255)";
                                $strInsertIntoTable.= ", $el";
                            }
                            $i++;
                        }
                        $strCreateTable.=") ";
                        $strInsertIntoTable.=") ";
                        $createDB = $mysql->prepare($strCreateTable);
                        $createDB->execute();
                        $i=0;
                        foreach ($queryArray as $index => $value){
                            $result = $mysql->prepare($strInsertIntoTable.$value);
                            $result->execute();
                            $i++;
                        }

                        echo "<div class='container'>Файл с данными получен из $url и обработан. Создана таблица $name[0]_imported. Количество записей: $i </div>";

                    }
                }else{
                    echo 'неправильный формат';
                }
            }else{
                echo 'файла не существует';
            }
            
        }
    ?>

</body>
</html>