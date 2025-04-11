<?php
include "functions_db.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $clientId = (int)$_GET['id'];
    $client = getClientById($clientId);
    if (!$client) {
        die("Клиент не найден.");
    }
} else {
    die("Некорректный ID клиента.");
}
?>
<html>
<head>
    <title>Редактирование клиента</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="edit_client_controller.php?id=<?= $clientId ?>">
        <h1>Редактирование клиента</h1>
        <label for="SNPclient">ФИО:</label><br>
        <input type="text" id="SNPclient" name="SNPclient" value="<?= htmlspecialchars($client['SNPclient']) ?>"><br><br>
        <label for="CivilPassportDetails">Детали гражданского паспорта:</label><br>
        <input type="text" id="CivilPassportDetails" name="CivilPassportDetails" value="<?= htmlspecialchars($client['CivilPassportDetails']) ?>"><br><br>
        <label for="ForeignPassportDetails">Детали загранпаспорта:</label><br>
        <input type="text" id="ForeignPassportDetails" name="ForeignPassportDetails" value="<?= htmlspecialchars($client['ForeignPassportDetails']) ?>"><br><br>
        <label for="VisaAvailability">Наличие визы:</label><br>
        <select id="VisaAvailability" name="VisaAvailability">
            <option value="Да" <?= ($client['VisaAvailability'] == 'Да') ? 'selected' : '' ?>>Да</option>
            <option value="Нет" <?= ($client['VisaAvailability'] == 'Нет') ? 'selected' : '' ?>>Нет</option>
        </select><br><br>
        <label for="VisaDetails">Детали визы:</label><br>
        <input type="text" id="VisaDetails" name="VisaDetails" value="<?= htmlspecialchars($client['VisaDetails']) ?>"><br><br>
        <label for="DiscountForRegularCustomers">Скидка для постоянных клиентов:</label><br>
        <input type="number" id="DiscountForRegularCustomers" name="DiscountForRegularCustomers" value="<?= htmlspecialchars($client['DiscountForRegularCustomers']) ?>"><br><br>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>