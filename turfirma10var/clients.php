<?php
include "functions_db.php";
// Получаем всех клиентов
$clients = getAllClients();
// Получаем клиента по конкретному id
$clientId = 2;
$client = getClientById($clientId);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="utf-8"/>
        <title>Клиенты</title>
    </head>
    <body>
    <div class="container">
    <table class="table table-striped">
    <thead><th>ClientID</th><th>SNPclient</th><th>CivilPassportDetails</th><th>ForeignPassportDetails</th><th>VisaAvailability</th><th>VisaDetails</th><th>DiscountForRegularCustomers</th></thead>
    <?php
    for($i = 0; $i < count($clients); $i++)
    {
        $ClientID = $clients[$i]["ClientID"];
        $SNPclient = $clients[$i]["SNPclient"];
        $CivilPassportDetails = $clients[$i]["CivilPassportDetails"];
        $ForeignPassportDetails = $clients[$i]["ForeignPassportDetails"];
        $VisaAvailability = $clients[$i]["VisaAvailability"];
        $VisaDetails = $clients[$i]["VisaDetails"];
        $DiscountForRegularCustomers = $clients[$i]["DiscountForRegularCustomers"];
        echo "<tr><td>$ClientID</td><td>$SNPclient</td><td>$CivilPassportDetails</td><td>$ForeignPassportDetails</td><td>$VisaAvailability</td><td>$VisaDetails</td><td>$DiscountForRegularCustomers</td></tr>";
    }
    ?>
    </table>
    <?php
        // Вывод данных клиента по конкретному id
        if (isset($client)) {
            echo "<div class='mt-3'><h4>Информация о клиенте с ID $clientId:</h4>";
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>ClientID</th><th>SNPclient</th><th>CivilPassportDetails</th><th>ForeignPassportDetails</th><th>VisaAvailability</th><th>VisaDetails</th><th>DiscountForRegularCustomers</th></tr></thead>";
            echo "<tbody><tr>";
            echo "<td>" . $client["ClientID"] . "</td>";
            echo "<td>" . $client["SNPclient"] . "</td>";
            echo "<td>" . $client["CivilPassportDetails"] . "</td>";
            echo "<td>" . $client["ForeignPassportDetails"] . "</td>";
            echo "<td>" . $client["VisaAvailability"] . "</td>";
            echo "<td>" . $client["VisaDetails"] . "</td>";
            echo "<td>" . $client["DiscountForRegularCustomers"] . "</td>";
            echo "</tr></tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p>Нет данных для отображения.</p>";
        }
        ?>
    </div>
        <?php include "footer.php";?>
    </body>
</html>