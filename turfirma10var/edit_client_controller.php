<?php
include "functions_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $clientId = (int)$_GET['id'];
    $SNPclient = $_POST['SNPclient'];
    $CivilPassportDetails = $_POST['CivilPassportDetails'];
    $ForeignPassportDetails = $_POST['ForeignPassportDetails'];
    $VisaAvailability = $_POST['VisaAvailability'];
    $VisaDetails = $_POST['VisaDetails'];
    $DiscountForRegularCustomers = $_POST['DiscountForRegularCustomers'];

    $result = updateClient($clientId, $SNPclient, $CivilPassportDetails, $ForeignPassportDetails, $VisaAvailability, $VisaDetails, $DiscountForRegularCustomers);
    if ($result) {
        header("Location: clients.php");
        exit();
    } else {
        $error = "Ошибка при обновлении данных клиента.";
        echo $error;
    }
} else {
    die("Некорректный запрос.");
}
?>