<?php
$host_db = "heltica.cba.pl";
$user_db = "helticadb";
$pass_db = "Helticadb1";
$db_name = "heltica";
$tbl_name = "m_uzytkownicy";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("Umar bo: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE login = '$username'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {     

     $row = $result->fetch_array(MYSQLI_ASSOC);
     if ($password == $row["haslo"]) { 
        echo "Success,".$row["id_uzytkownika"];
     } else { 
       echo "upX";
     }
 }
 else
 {
    echo "upX";
 }
 mysqli_close($conexion);
 ?>