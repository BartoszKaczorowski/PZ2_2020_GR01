<?php
$host_db = "heltica.cba.pl";
$user_db = "helticadb";
$pass_db = "Helticadb1";
$db_name = "heltica";

$connection=mysqli_connect('heltica.cba.pl','helticadb','Helticadb1','heltica');

//if ($connection->connect_error) {
// die("Umar bo: " . $connection->connect_error);
//}

$sql = "SELECT * FROM m_lokale;";

$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                        echo $row["id_lokalu"].",".$row["nazwa"].";";
                    }
                }
 mysqli_close($conexion);
 ?>
 


