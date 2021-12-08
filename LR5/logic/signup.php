<?php
require_once "include_db.php";

$Salt = "1afa148eb41f2e7103f21410bf48346c";
$Login = htmlspecialchars($_POST['Login']);
$FIO = htmlspecialchars($_POST["FIO"]);
$Password1 = htmlspecialchars($_POST['Password1']);
$Password2 = htmlspecialchars($_POST['Password2']);
$DateBirth = htmlspecialchars($_POST["DateBirth"]);
$Address = htmlspecialchars($_POST["Address"]);
$Gender = htmlspecialchars($_POST["Gender"]);
$Interests = htmlspecialchars($_POST["Interests"]);
$VK = htmlspecialchars($_POST["VK"]);
$GroupBlood = htmlspecialchars($_POST["GroupBlood"]);
$RHfactor = htmlspecialchars($_POST["RHfactor"]);

$optionItem1 = [
    "Мужской",
    "Женский"
];

$optionItem2 = [
    1,
    2,
    3,
    4
];

$optionItem3 = [
    "Положительный",
    "Отрицательный"
];

$arrayerrors = [
    "errfio" => "",
    "errlogin" => "",
    "errpassword" => "",
    "errbirth" => "",
    "erraddress" => "",
    "errinterests" => "",
    "errvk" => "",
];
if(isset($_POST['register'])){

    $users = $mysql->prepare("SELECT * FROM users WHERE Login=:Login");
    $users->execute([
        ':Login' => $Login,
    ]);

    $usernum = $users->fetchColumn();
    $errors = 0;

    if($usernum){
        $arrayerrors['errlogin'] = 'Пользователь с таким логином уже существует';
        $errors++;
    }

    if(filter_var($Login, FILTER_VALIDATE_EMAIL)){
        $arrayerrors['errlogin'] = 'Невалидный email';
        $errors++;
    }
    if ($Login == ""){
        $arrayerrors['errlogin'] = 'Заполните поле';
        $errors++;
    }
    if($FIO == ""){
        $arrayerrors['errfio'] = 'Заполните ФИО полностью';
        $errors++;
    }

    // password check
    // asdf-=@#$%2_134fr fAwre

    $regex = "/^[\S\s]*(?=.+[A-Z])(?=.+[a-z])(?=.+\d)(?=.+[$&+,:;=?@#|'<>.^*()%!])(?=.+[\s])(?=.+[-])(?=.+[_])[\S\s]*/";
    if (!preg_match($regex, $Password1) || preg_match("/^(?=.*[А-Я])(?=.*[а-я])$/", $Password1) || strlen($Password1) <= 6) {
        $arrayerrors['errpassword'] = "Пароль должен состоять из латинских букв разного регистра <br /> спецсимволов, пробелов, дефисов, подчёркиваний и цифр";
        $errors++;
    }
    if($Password1 != $Password2 ){
        $arrayerrors['errpassword'] = 'Пароли не совпадают';
        $errors++;
    }
    if($Password1 == ""){
        $arrayerrors['errpassword'] = 'Введите пароль';
        $errors++;
    }
    
    if ($DateBirth == ""){
        $arrayerrors['errbirth'] = 'Введите дату рождения';
        $errors++;
    }
    if($Address == ""){
        $arrayerrors['erraddress'] = 'Введите адрес';
        $errors++;
    }
    if($Interests == ""){
        $arrayerrors['errinterests'] = 'Введите интересы';
        $errors++;
    }
    if($VK == ""){
        $arrayerrors['errvk'] = 'Введите ссылку';
        $errors++;
    }

    if($errors==0){
        $PasswordHash = md5($Salt . $Password1);
        $id = uniqid();
        $query = "INSERT INTO users (Login, Password, FIO, Address, Gender, Date_birth, ID, Interests, VK, Group_blood, RH_factor) VALUES (:Login, :PasswordHash, :FIO, :Address, :Gender, :Date_birth, :ID, :Interests, :VK, :Group_blood, :RH_factor)";
        $resultQuery = $mysql->prepare($query);
        $resultQuery->execute([
            ':Login' => $Login,
            ':PasswordHash' => $PasswordHash,
            ':FIO' => $FIO,
            ':Address' => $Address,
            ':Gender' => $Gender,
            ':Date_birth' => $DateBirth,
            ':ID' => $id,
            ':Interests' => $Interests,
            ':VK' => $VK,
            ':Group_blood' => $GroupBlood,
            ':RH_factor' => $RHfactor,
        ]);

        session_start();
        $_SESSION["user"] = $Login;
        $_SESSION["id"] = $id;

        header("Location: index.php");
    }
    
}

?>