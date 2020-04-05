<!-- dodanie danych do bazy -->

<?php
require_once('connection.php');


 

$userName = $_POST['username'];
// $email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['confirm_password'];


 //  SPRAWDZAM CZY UŻYTKOWNIK O PODANEJ NAZWIE JUŻ ISTNEIEJE
$sql_u = "SELECT * FROM m_uzytkownicy WHERE login='".$_POST['username']."'";
$res_u = mysqli_query($connection, $sql_u);

//JEŻELI UŻYTKOWNIK O PODANEJ NAZWIE ISTNIEJE WYŚWIETLAM WIADOMOŚĆ
if (mysqli_num_rows($res_u) > 0) {
        ?><script>window.location.href = "index.php?Username=false";</script><?php
        
 }

 //  JEŻELI OBA WPROWADZONE HASŁA SĄ TAKIE SAME TO WRZUCAMY DO BAZY, JAK NIE WYŚWIETLAM WIADOMOŚĆ
 elseif($password == $password2){

    $sql = "INSERT INTO m_uzytkownicy (login, haslo) VALUES ('$userName','$password')";
    $result = mysqli_query($connection, $sql);

     if($result)
         {
             ?><script>window.location.href = "index.php?registered=true";</script><?php
         }

         else {
        // failed :(
         echo "Error :".$sql;
        }

 }
 //JEŻELI HASŁA SIĘ NIE ZGADZAJĄ WYŚWIETLAM WIADOMOŚĆ
else
{
    ?><script>window.location.href = "index.php?registered=false";</script><?php
}

?>
