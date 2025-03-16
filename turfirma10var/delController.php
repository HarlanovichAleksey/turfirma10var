<?php
include "functions_db.php";
delClientById($_GET['id']);
delUserById($_GET['id']);
header("Location: clients.php");
?>