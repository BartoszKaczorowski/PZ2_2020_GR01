<?php
$host_db = "heltica.cba.pl";
$user_db = "helticadb";
$pass_db = "Helticadb1";
$db_name = "heltica";

$connection=mysqli_connect('heltica.cba.pl','helticadb','Helticadb1','heltica');
$connection->set_charset("utf8");
$idLokalu = $_POST['idLokalu'];
$sql = "SELECT * FROM m_dania WHERE id_lokalu = $idLokalu";

$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                        echo $row["id_dania"]."+".$row["nazwa"]."+".$row["opis"]."+".$row["cena"].";";
                    }
                }
 mysqli_close($conexion);
 ?>
