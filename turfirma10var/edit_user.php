<?php
include "functions_db.php";
$citys = get_all_citys();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = (int)$_GET['id'];
    $user = getUserById($userId);
    if (!$user) {
        die("Пользователь не найден.");
    }
} else {
    die("Некорректный ID пользователя.");
}
?>
<html>
<head>
    <title>Редактирование пользователя</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="edit_user_controller.php?id=<?= $userId ?>">
        <h1>Редактирование пользователя</h1>
        <label for="FIO">ФИО:</label><br>
        <input type="text" id="FIO" name="FIO" value="<?= htmlspecialchars($user['FIO']) ?>"><br><br>
        <label for="Login">Логин:</label><br>
        <input type="text" id="Login" name="Login" value="<?= htmlspecialchars($user['Login']) ?>"><br><br>
        <label for="Telephone">Телефон:</label><br>
        <input type="text" id="Telephone" name="Telephone" value="<?= htmlspecialchars($user['Telephone']) ?>"><br><br>
        <label for="Password">Пароль:</label><br>
        <input type="text" id="Password" name="Password" value="<?= htmlspecialchars($user['Password']) ?>"><br><br>
        <label for="BirthDate">Дата рождения:</label><br>
        <input type="date" id="BirthDate" name="BirthDate" value="<?= htmlspecialchars($user['BirthDate']) ?>"><br><br>
        <label for="CitysID">Город:</label><br>
        <select id="CitysID" name="CitysID">
            <?php
            foreach ($citys as $city) {
                $selected = ($city['CitysID'] == $user['CitysID']) ? 'selected' : '';
                echo '<option value="' . $city['CitysID'] . '" ' . $selected . '>' . htmlspecialchars($city['CitysName']) . '</option>';
            }
            ?>
        </select><br><br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>