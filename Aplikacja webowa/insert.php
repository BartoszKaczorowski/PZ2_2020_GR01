<!-- dodanie danych do bazy -->

<?php
require_once('connection.php');

 //$db = mysqli_connect('localhost', 'root', '', 'mniampl');
 $db = mysqli_connect('heltica.cba.pl','helticadb','Helticadb1','heltica');

$userName = $_POST['username'];
// $email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['confirm_password'];


    $sql = "INSERT INTO Users (Username, Password) VALUES ('$userName','$password')";
    $result = mysqli_query($con, $sql);

     if($result)
         {
             ?><script>window.location.href = "index.php?registered=true";</script><?php
         }

         else {
        // failed :(
         echo "Error :".$sql;
        }



?>