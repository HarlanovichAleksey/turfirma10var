<?php
include "functions_db.php";
$citys = get_all_citys($link);
?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>
<body>
    <div>
        <form action="add_user_controller.php" method="POST" role='form'>
            <div>
                <div> <label for="FIO" >Укажите ваше ФИО:</label>
                    <div><input id="FIO" type="text" name="FIO"/>
                </div>
            </div>
            <div> <label for="Login">Впишите свой логин:</label>
                <div>
                    <input id="Login" type="text" name="Login"/>
                </div>
            </div>
            <div> <label for="Telephone">Укажите свой номер телефона:</label>
                <div>
                    <input id="Telephone" type="text" name="Telephone"/>
                </div>
            </div>
            <div> <label for="Password">Введите пароль:</label>
                <div>
                    <input id="Password" type="text" name="Password"/>
                </div>
            </div>
            <div> <label for="BirthDate">Укажите свою дату рождения:</label>
                <div>
                    <input id="BirthDate" type="date" name="BirthDate"/>
                </div>
            </div>
            <div class="form-group">
                <label for="citys">Выберите свой город:</label>
                <select id="citys" name="citys">
                    <option value="">Выберите город</option>
                    <?php
                    foreach ($citys as $city) {
                        $citysId = $city['CitysID'];
                        $citysName = htmlspecialchars($city['CitysName']);
                        echo '<option value="' . $citysId . '">' . $citysName . '</option>';
                    }
                    ?>
                </select>
            </div>
                <button type="submit" name="add">Добавить!</button></div>
            </div>
        </form>
    </div>
</body>
</html>