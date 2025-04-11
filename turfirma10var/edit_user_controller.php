<?php
include "functions_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = (int)$_GET['id'];
    $FIO = $_POST['FIO'];
    $Login = $_POST['Login'];
    $Telephone = $_POST['Telephone'];
    $Password = $_POST['Password'];
    $BirthDate = $_POST['BirthDate'];
    $CitysID = $_POST['CitysID'];

    $result = updateUser ($userId, $FIO, $Login, $Telephone, $Password, $BirthDate, $CitysID);
    if ($result) {
        header("Location: clients.php");
        exit();
    } else {
        $error = "Ошибка при обновлении данных пользователя.";
        echo $error;
    }
} else {
    die("Некорректный запрос.");
}
?>