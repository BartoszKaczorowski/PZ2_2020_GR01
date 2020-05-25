<?php 
session_start();
require_once('connection.php');


//dodawanie do koszyka
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			//echo '<script>alert("Danie już dodane.")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

//usuwanie z koszyka
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				//echo '<script>alert("Danie usunięte.")</script>';
				echo '<script>window.location="cusisineTurkish.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>MENU</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link
        href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:300,700|Saira:300,400&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
		 <!--	do używania ikon z FontAwesome   -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>


a.submit{
	padding: 10px 15px;
	background: #FACE58;
	text-decoration: none;
	color: white;
	border-radius: 20px;
	position: absolute;
	right: 100px;
	margin: 20px;
	
}

a.backHome{
	padding: 10px 15px;
	background: #FACE58;
	text-decoration: none;
	color: white;
	border-radius: 20px;
	position: absolute;
	left: 100px;
	margin: 20px;
}

	</style>

	</head>
	<body>

<!-- zalogowany uzytkownik -->
		<?php
        
        if(isset($_SESSION['User']))
            {
                 echo "<div style='text-align:right; margin-top: 15px; margin-right: 15px;'>";
            echo " ".' Zalogowano,'. " ". $_SESSION['User'];
                ?>
                <style type="text/css">
            .Login {
                display: none;
            }
        </style>

        <style type="text/css">
            .LogOut {
                visibility: visible;
            }
        </style>
        <?php
            }

                ?>

<div style="display: flex;">

<p class="title" style=" margin-top: 50px; margin-left: 50px; width: 5%; color: black; font-size: 45px; font-family: 'Saira Extra Condensed', sans-serif;">Mniam</p>

<section style=" width: 50%;">

		</section>
		</div>

		<br />
		<div class="container">
			<h1 align="center">MENU - kuchnia turecka</h1><br />
			<br /><br />
            <?php
            // wyciągam dania z bazy danych
				$query = "SELECT * FROM m_dania WHERE id_lokalu = 2";

				 $_SESSION['WybranyLokal']=2;
				
				$result = mysqli_query($connection, $query);
				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
				<!-- karty z daniami  -->
			<div style="margin-bottom: 50px;" class="col-md-6">
                <form method="post" action="cusisineTurkish.php?action=add&id=<?php echo $row["id_dania"]; ?>">
                
                        <div style="background-color: #FACE58; border-radius: 5px; padding: 16px; text-align: center; width: 100%;">
						
						<h4 style="color: black;" class="text-info"><?php echo $row["nazwa"]; ?></h4>

                        <h4 style="color: white;" class="text-danger"> <?php echo $row["cena"]; ?> zł</h4>
                        
                        <h4 style="color: black;" class="text-danger"> <?php echo $row["opis"]; ?></h4>

                        <input type="text" name="quantity" value="1" class="form-control" />

                        <input type="hidden" name="hidden_name" value="<?php echo $row["nazwa"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["cena"]; ?>" />

						<input style="background-color: #F5585C; border: none; margin-top: 10px;" type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Dodaj do koszyka" />

					</div>
				</form>
			
			</div>
			<?php
					}
				}
			?>
			
			
			<h3 style="text-align: left;">Szczegóły zamówienia</h3>
			<div class="table-responsive" >
                <!-- szczegóły zamówienia -->
				<table class="table table-bordered">
					<tr>
						<th width="40%">Nazwa dania</th>
						<th width="10%">Ilość</th>
						<th width="20%">Cena jednostkowa</th>
						<th width="15%">Cena całkowita</th>
						<th width="5%">Koszyk</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<!-- szczegóły zamówienia - poszczególne elementy -->
					<tr>
						<td name="danie" required><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td><?php echo $values["item_price"]; ?> zł</td>
						<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> zł</td>
						<td><a style="text-decoration: none;" href="cusisineTurkish.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Usuń</span></a></td>
					</tr>
					<?php
					            //   obliczenie całkowitej ceny zamówienia
							 $total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
					                     <!-- całkowitej cena zamówienia -->
						<td colspan="3" align="right" style="font-weight: bold;">Całkowita cena zamówienia</td>
						<td align="right"> <?php echo number_format($total, 2); ?> zł</td>
						<td></td>
					</tr>
					<?php
					}
					?>


				

 <!-- jeżeli nic nie wrzucimy do koszyka to przycisk przejdź do finalizacji zamówienia jest wyłączony -->
					<?php
							if(empty($item_array))
							{
					?>
								
								<style type="text/css">
            						.submit {
										/*display: none;*/
										pointer-events: none;
           							 }
       							 </style>
					<?php
							}
							else{
					?>
								<style type="text/css">
            						.submit {
								/*display: block;*/
								pointer-events: auto;
           							 }
        						</style>
					<?php
							}
					?>


						
				</table>
			</div>
		</div>
	</div>


		<a class="backHome" type="submit" href="index.php">Powrót do strony głównej</a>
	 <a class="submit" type="submit" href="submitOrder.php">Przejdź do finalizacji zamówienia</a> 


	</body>
</html>

