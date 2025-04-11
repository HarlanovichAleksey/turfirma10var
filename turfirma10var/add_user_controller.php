<?php
include "functions_db.php";
openDB();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $FIO = $_POST['FIO'];
    $Login = $_POST['Login'];
    $Telephone = $_POST['Telephone'];
    $Password = $_POST['Password'];
    $BirthDate = $_POST['BirthDate'];
    $citysID = $_POST['citys'];
    $result = add_user($FIO, $Login, $Telephone, $Password, $BirthDate, $citysID);
    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Ошибка при добавлении пользователя.";
    }
}
?>