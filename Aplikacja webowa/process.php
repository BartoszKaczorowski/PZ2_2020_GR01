<!-- pobranie danych wejściowych -->
<?php 
require_once('connection.php');

session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['Username']) || empty($_POST['Password']))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from Users where Username='".$_POST['Username']."' and Password='".$_POST['Password']."'";
            $result=mysqli_query($con,$query);
 
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['Username'];
                header("location:welcome.php");
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