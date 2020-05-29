<?php
session_start();
require_once('connection.php');

$idUsera = $_SESSION["IdZalogowanegoUsera"];
$m_tel = $_POST['tel'];
$m_ulica = $_POST['ulica'];
$m_nr_budynku = $_POST['nr_budynku'];
$m_kod_pocztowy = $_POST['kod_pocztowy'];
$m_miejscowosc = $_POST['miejscowosc'];

$user = "SELECT * FROM m_zamawiajacy WHERE id_uzytkownika=$idUsera";
$res_user = mysqli_query($connection, $user);

if (mysqli_num_rows($res_user) > 0) {
        $sqla = "UPDATE m_zamawiajacy SET telefon='$m_tel', ulica='$m_ulica', nr_budynku='$m_nr_budynku', kod_pocztowy='$m_kod_pocztowy', miejscowosc='$m_miejscowosc' WHERE id_uzytkownika='$idUsera'";
$zamowieniee=mysqli_query($connection,$sqla); 
        
 }else{
    $sql = "INSERT INTO m_zamawiajacy (id_uzytkownika, telefon, ulica, nr_budynku, kod_pocztowy, miejscowosc) VALUES ('$idUsera','$m_tel','$m_ulica','$m_nr_budynku','$m_kod_pocztowy','$m_miejscowosc')";
$zamowienie=mysqli_query($connection,$sql);
}

?>
<script>window.location.href = "index.php?address=true";</script> 
