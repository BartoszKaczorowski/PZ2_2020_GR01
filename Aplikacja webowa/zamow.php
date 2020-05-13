<?php 
session_start();
require_once('connection.php');

echo $_SESSION['WybranyLokal'];

//jeżeli user nie jest zalogowany to jego id = 2
if (!isset($_SESSION["IdZalogowanegoUsera"])){
    $_SESSION["IdZalogowanegoUsera"] = 2;
}

//pobranie najwyższego id_zamówienia
$idZamowienia = "SELECT MAX(id_zamowienia) AS ID
FROM m_zamowienia";

$result=mysqli_query($connection,$idZamowienia);

$row = mysqli_fetch_array($result);

echo $row['ID'];

//nowe id_zamówienia = najwyższe w bazie + 1
$noweId = $row['ID']+1;

$tel = $_POST['tel'];
$ulica = $_POST['ulica'];
$nrbudynku = $_POST['nr_budynku'];
$kodpocztowy = $_POST['kod_pocztowy'];
$miejscowosc = $_POST['miejscowosc'];

//wstawienie nowego zamówienia do bazy
$zamowienia = "INSERT INTO m_zamowienia (id_zamowienia, id_uzytkownika, id_lokalu, ulica, nr_budynku, kod_pocztowy, miejscowosc, telefon, status)
VALUES (".$noweId.", ".$_SESSION['IdZalogowanegoUsera'].", ".$_SESSION['WybranyLokal'].",'".$ulica."', ".$nrbudynku.", '".$kodpocztowy."', '".$miejscowosc."', ".$tel.", 'oczekujące')";

$zamowienie=mysqli_query($connection,$zamowienia);
echo $zamowienia;

//nowe szczegóły zamówienia do bazy
foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
$sql = "INSERT INTO m_szczegolyzamowienia (id_zamowienia, id_dania, ilosc) VALUES (".$noweId.",'".$values['item_id']."', '".$values['item_quantity']."')";
 $result = mysqli_query($connection, $sql);
            }

//czyszczenie koszyka
unset($_SESSION["shopping_cart"]);
?><script>window.location.href = "index.php?order=true";</script><?php
?>