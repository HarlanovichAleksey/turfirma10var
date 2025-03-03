<html>
	<head>
		<meta charset="utf-8"/>
		<title>Запрос</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
		<h1>Клиенты с завершенными поездками</h1>
		<?php
		include "functions_db.php";
		$clients = getCompletedTripsClients();
		if(count($clients) == 0){
			echo "<p>Нет клиентов с завершенными поездками.</p>";
		} else {
			echo "<table class='table table-striped'>";
			echo "<thead><th>ClientID</th><th>SNPclient</th><th>CivilPassportDetails</th><th>ForeignPassportDetails</th><th>VisaAvailability</th><th>VisaDetails</th><th>DiscountForRegularCustomers</th></thead>";
			for($i = 0; $i < count($clients); $i++) {
				$ClientID = $clients[$i]["ClientID"];
				$SNPclient = $clients[$i]["SNPclient"];
				$CivilPassportDetails = $clients[$i]["CivilPassportDetails"];
				$ForeignPassportDetails = $clients[$i]["ForeignPassportDetails"];
				$VisaAvailability = $clients[$i]["VisaAvailability"];
				$VisaDetails = $clients[$i]["VisaDetails"];
				$DiscountForRegularCustomers = $clients[$i]["DiscountForRegularCustomers"];
				echo "<tr><td>$ClientID</td><td>$SNPclient</td><td>$CivilPassportDetails</td><td>$ForeignPassportDetails</td><td>$VisaAvailability</td><td>$VisaDetails</td><td>$DiscountForRegularCustomers</td></tr>";
			}
			echo "</table>";
		}
		?>
	</div>
		<?php include "footer.php";?>
	</body>
</html>