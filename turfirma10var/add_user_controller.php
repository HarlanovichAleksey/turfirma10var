<?php
include "functions_db.php";
connect_db();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $FIO = $_POST['FIO'];
    $Login = $_POST['Login'];
    $Telephone = $_POST['Telephone'];
    $Password = $_POST['Password'];
    $BirthDate = $_POST['BirthDate'];
    $citysID = $_POST['citys'];
    $otherCity = $_POST['otherCity'];
    $errors = [];
    if (empty($FIO)) {
        $errors[] = "ФИО не должно быть пустым.";
    }
    if (strlen($Login) > 10) {
        $errors[] = "Логин не должен превышать 10 символов.";
    }
    if (!preg_match('/^\+\d{1,14}$/', $Telephone)) {
        $errors[] = "Телефон должен начинаться с + и содержать не более 15 символов.";
    }
    if (strlen($Password) > 15 || !preg_match('/[A-Za-z]/', $Password) || !preg_match('/[0-9]/', $Password)) {
        $errors[] = "Пароль должен содержать не более 15 символов и включать буквы и цифры.";
    }
    if (empty($BirthDate) || !DateTime::createFromFormat('Y-m-d', $BirthDate)) {
        $errors[] = "Дата рождения указана неверно.";
    }
    if (empty($citysID) && empty($otherCity)) {
        $errors[] = "Выберите город или укажите другой.";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    } else {
        if ($citysID === 'other' && !empty($otherCity)) {
            $otherCity = mysqli_real_escape_string($link, $otherCity);
            $insertCityQuery = "INSERT INTO citys (CitysName) VALUES ('$otherCity')";
            if (mysqli_query($link, $insertCityQuery)) {
                $citysID = mysqli_insert_id($link);
            } else {
                $errors[] = "Ошибка при добавлении города: " . mysqli_error($link);
                foreach ($errors as $error) {
                    echo "<p class='error'>$error</p>";
                }
                exit;
            }
        }
        $result = add_user($FIO, $Login, $Telephone, $Password, $BirthDate, $citysID);
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Ошибка при добавлении пользователя.";
        }
    }
}
?>