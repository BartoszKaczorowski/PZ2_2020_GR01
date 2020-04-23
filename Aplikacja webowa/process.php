<!-- OBSŁUGA LOGOWANIA -->
<!-- pobranie danych wejściowych -->

<?php 
require_once('connection.php');

session_start();

    if(isset($_POST['Login']))
    {
           ///pobieram dane z bazy i sprawdzam
            $query="SELECT * FROM m_uzytkownicy where login='".$_POST['Username']."' and haslo='".$_POST['Password']."'";
            //funkcja mysqli_query wysyła zapytanie do bazy, a jej argumentami są identyfikator połączenia oraz treść zapytania
            $result=mysqli_query($connection,$query);
 
            //jeżeli wszystko się zgadza
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['Username'];
                 ?><script>window.location.href = "index.php?Logged=true";</script><?php
            }
            else
            {
                //informacja jeśli nazwa użytkownika lub hasło są niepoprawne
                ?><script>window.location.href = "index.php?Invalid=true";</script><?php
            }
    }
       
   /* else
    {
        echo 'Aktualnie nie popracujesz. Sprawdź przycisk logowania.';
    }*/
       
 
?>
