<!-- pobranie danych wejściowych -->
<?php 
require_once('connection.php');

session_start();
    if(isset($_POST['Login']))
    {
        //jeżeli inputy od loginu i hasla puste to komunikat
       if(empty($_POST['Username']) || empty($_POST['Password']))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from m_uzytkownicy where login='".$_POST['Username']."' and haslo='".$_POST['Password']."'";
            $result=mysqli_query($connection,$query);
 
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['Username'];
                //header("location:welcome.php");
                 header("location:index.php?Logged=true");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }
 
?>
