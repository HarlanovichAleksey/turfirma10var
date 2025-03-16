<?php
$link = false;
function openDB() {
    global $link;
    $link = mysqli_connect("localhost", "root", "", "turfirma10var");
    mysqli_query($link, "SET NAMES UTF8");
}
function closeDB() {
    global $link;
    mysqli_close($link);
}
function connect_db() {
    global $link;
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "turfirma10var";
    $link = mysqli_connect($host, $user, $password, $database);
    if (!$link) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }
    mysqli_query($link, "SET NAMES UTF8");
}
function getAllClients() {
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
function getAllUsers() {
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM users");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
function getCompletedTripsClients() {
    global $link;
    openDB();
    $sql = "SELECT
                c.ClientID, c.SNPclient,
                c.CivilPassportDetails,
                c.ForeignPassportDetails,
                c.VisaAvailability, c.VisaDetails,
                c.DiscountForRegularCustomers
            FROM clients c
            JOIN treaty tr ON c.ClientID = tr.ClientID
            WHERE tr.TripStatus = 'Состоялась'";
    $res = mysqli_query($link, $sql);
    $clients = mysqli_fetch_all($res, MYSQLI_ASSOC);
    closeDB();
    return $clients;
}
function getClientById($clientId) {
    global $link;
    openDB();
    $sql = "SELECT * FROM clients WHERE ClientID = $clientId";
    $res = mysqli_query($link, $sql);
    $client = mysqli_fetch_assoc($res);
    closeDB();
    return $client;
}
function delClientById($id) {
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM clients WHERE ClientID=$id");
    closeDB();
    return $res;
}
function delUserById($id) {
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM users WHERE UserID=$id");
    closeDB();
    return $res;
}
function add_user($FIO, $Login, $Telephone, $Password, $BirthDate, $citysID) {
    global $link;
    openDB();
    $FIO = mysqli_real_escape_string($link, $FIO);
    $Login = mysqli_real_escape_string($link, $Login);
    $Telephone = mysqli_real_escape_string($link, $Telephone);
    $Password = mysqli_real_escape_string($link, $Password);
    $BirthDate = mysqli_real_escape_string($link, $BirthDate);
    $citysID = (int)$citysID;
    $sql = "INSERT INTO users (FIO, Login, Telephone, Password, BirthDate, CitysID) VALUES ('$FIO', '$Login', '$Telephone', '$Password', '$BirthDate', $citysID)";
    $result = mysqli_query($link, $sql);
    closeDB();
    return $result;
}
function get_all_citys()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM citys ORDER BY CitysName");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
?>