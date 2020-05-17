<?php
$host_db = "heltica.cba.pl";
$user_db = "helticadb";
$pass_db = "Helticadb1";
$db_name = "heltica";

$connection=mysqli_connect('heltica.cba.pl','helticadb','Helticadb1','heltica');

$idUser = $_POST['idUser'];
$sql = "SELECT * FROM m_zamawiajacy WHERE id_uzytkownika = $idUser";

$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        echo $row["telefon"]."+".$row["ulica"]."+".$row["nr_budynku"]."+".$row["kod_pocztowy"]."+".$row["miejscowosc"];
    }
 mysqli_close($conexion);
 ?>