<?php
$host_db = "heltica.cba.pl";
$user_db = "helticadb";
$pass_db = "Helticadb1";
$db_name = "heltica";

$connection=mysqli_connect('heltica.cba.pl','helticadb','Helticadb1','heltica');
$connection->set_charset("utf8");
$idZamowienia = "SELECT MAX(id_zamowienia) AS ID FROM m_zamowienia";
$result = mysqli_query($connection, $idZamowienia);
$row = mysqli_fetch_array($result);
$noweId = $row['ID']+1;


$idUser = $_POST['idUser'];
$idLocal = $_POST['idLocal'];
$ulica = $_POST['ulica'];
$nr_budynku = $_POST['nr_budynku'];
$kod_pocztowy = $_POST['kod_pocztowy'];
$miejscowosc = $_POST['miejscowosc'];
$telefon = $_POST['telefon'];
$dania = $_POST["dania"];
$sql = "INSERT INTO m_zamowienia VALUES ($noweId, $idUser, $idLocal, '$ulica', '$nr_budynku', '$kod_pocztowy', '$miejscowosc', $telefon, 'oczekujące')";
$zamowienie=mysqli_query($connection, $sql);

$pozycje = explode("#", $dania);
for($i = 0; $i < sizeof($pozycje)-1; $i++){
    $temp = explode("*", $pozycje[$i]);
    $sql = "INSERT INTO m_szczegolyzamowienia VALUES ($noweId, $temp[1], $temp[0])";
    $result = mysqli_query($connection, $sql);
}
echo "Works";
?>