<?php
$link = false;
function openDB()
{
    global $link;
    $link = mysqli_connect("localhost", "root", "", "turfirma10var");
    mysqli_query($link, "SET NAMES UTF8");
}
function closeDB()
{
    global $link;
    mysqli_close($link);
}
function getAllClients()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
function getCompletedTripsClients()
{
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
function getClientById($clientId)
{
    global $link;
    openDB();
    $sql = "SELECT * FROM clients WHERE ClientID = $clientId";
    $res = mysqli_query($link, $sql);
    $client = mysqli_fetch_assoc($res);
    closeDB();
    return $client;
}
?>