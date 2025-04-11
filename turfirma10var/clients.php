<?php
include "functions_db.php";
$clients = getAllClients();
$users = getAllUsers();
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
        <h4>Список всех клиентов:</h4>
        <thead><th>ClientID</th><th>SNPclient</th><th>CivilPassportDetails</th><th>ForeignPassportDetails</th><th>VisaAvailability</th><th>VisaDetails</th><th>DiscountForRegularCustomers</th><th>Удалить</th><th>Редактировать</th></thead>
        <?php
        for($i = 0; $i < count($clients); $i++) {
            $ClientID = $clients[$i]["ClientID"];
            $SNPclient = $clients[$i]["SNPclient"];
            $CivilPassportDetails = $clients[$i]["CivilPassportDetails"];
            $ForeignPassportDetails = $clients[$i]["ForeignPassportDetails"];
            $VisaAvailability = $clients[$i]["VisaAvailability"];
            $VisaDetails = $clients[$i]["VisaDetails"];
            $DiscountForRegularCustomers = $clients[$i]["DiscountForRegularCustomers"];
            echo "<tr><td>$ClientID</td><td>$SNPclient</td><td>$CivilPassportDetails</td>
            <td>$ForeignPassportDetails</td><td>$VisaAvailability</td><td>$VisaDetails</td>
            <td>$DiscountForRegularCustomers</td><td class='text-center'><a href='delController.php?id=".$ClientID."'>
            <img src='open-iconic/svg/x.svg'</a></td><td><a href='edit_client.php?id=" . $clients[$i]["ClientID"] . "'>...</a></td></tr>";
        }
        ?>
        </table>
        <?php
            if (isset($client)) {
                echo "<div class='mt-3'><h4>Информация о клиенте с ID $clientId:</h4>";
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>ClientID</th><th>SNPclient</th>
                <th>CivilPassportDetails</th><th>ForeignPassportDetails</th>
                <th>VisaAvailability</th><th>VisaDetails</th><th>DiscountForRegularCustomers</th></tr></thead>";
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
        <table class="table table-striped">
            <h4>Список всех пользователей:</h4>
            <thead><th>UserID</th><th>FIO</th><th>Login</th><th>Telephone</th><th>Password</th><th>BirthDate</th><th>CitysID</th><th>Удалить</th><th>Редактировать</th></thead>
            <?php
            for($i = 0; $i < count($users); $i++) {
                $UserID = $users[$i]["UserID"];
                $FIO = $users[$i]["FIO"];
                $Login = $users[$i]["Login"];
                $Telephone = $users[$i]["Telephone"];
                $Password = $users[$i]["Password"];
                $BirthDate = $users[$i]["BirthDate"];
                $CitysID = $users[$i]["CitysID"];
                echo "<tr><td>$UserID</td><td>$FIO</td><td>$Login</td><td>$Telephone</td>
                <td>$Password</td><td>$BirthDate</td><td>$CitysID</td><td class='text-center'><a href='delController.php?id=".$UserID."'>
                <img src='open-iconic/svg/x.svg'</a></td><td><a href='edit_user.php?id=" . $users[$i]["UserID"] . "'>...</a></td></tr>";
            }
            ?>
        </table>
    </div>
        <?php include "footer.php";?>
    </body>
</html>