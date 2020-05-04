
<!-- po naciśnięciu przycisku wyloguj użytkownik zostanie przekierowany na stronę główną -->
<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location:index.php");
    }
 
?>