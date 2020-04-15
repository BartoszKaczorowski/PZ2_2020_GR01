
<!-- połączenie z bazą danych MySQL -->
<?php
 
    $connection=mysqli_connect('heltica.cba.pl','helticadb','Helticadb1','heltica');
  // $connection=mysqli_connect('localhost','root','','heltica');
 
  //komunitak gdy wystąpi błąd z połączeniem
    if(!$connection)
    {
        die('Sprawdź połączenie.'.mysqli_error($connection));
    }
?>