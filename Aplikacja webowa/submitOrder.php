<?php 
session_start();
require_once('connection.php');



?>

<html>
	<head>
		<title>MENU</title>
        <!--	do używania ikon z FontAwesome   -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
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
<!-- <link rel="stylesheet" href="styleOrder.css"> -->

<style>

body{
    background-color: #FACE58;

}

div.box{
    width: 100vw;
    height: 100vh;
    position: relative;
    
}

form{
    height: 500px;
    width: 50%;
    position: absolute;
    top: 30%;
    left: 25%;
    right: 25%;
    transform: scale(2);
}

form p{
    width: 100%;
    text-align: center;
    font-size: 25px;
    padding: 20px;
}

form button{
    position: absolute;
    right: 70px;
    margin-top: 20px;
    background-color: #FACE58;
    border: none;
    outline: none;
    border-radius: 20px;
    padding: 5px 20px;
}

input{
    width: 70%;
    height: 50px;
    margin-left: 15%;
    margin-right: 15%;
    padding: 10px;
    outline: none;
    border: 1px solid #FACE58;
    margin-bottom: 10px;
    border-radius: 4px;
}

@media(orientation: landscape) and (min-width: 533px) {
    form{
        height: 300px;
        width: 30%; 
        left: 35%;
        right: 35%;
        transform: scale(1.3);
    }

    input{
    width: 70%;
    height: 30px;
    margin-left: 15%;
    margin-right: 15%;
    padding: 10px;
    outline: none;
    border: 1px solid #FACE58;
    margin-bottom: 10px;
    border-radius: 4px;
}

form p{
    width: 100%;
    text-align: center;
    font-size: 20px;
    padding: 10px;
}

form button{
    margin: 3px;
}
}

</style>


	</head>
	<body>

<div class="box">
<form class="modal-content animate" action="zamow.php" method="post">

               
                <p class="zaloguj">Formularz zamówienia</p>
                <div class="containerInput">
                    <input maxlength="9" placeholder="telefon" name="tel" required>
					<input maxlength="20" placeholder="ulica" name="ulica" required>
                    <input maxlength="6" placeholder="nr budynku" name="nr_budynku" required>
                    <input maxlength="6" placeholder="kod Pocztowy" name="kod_pocztowy" required>
					<input maxlength="15" placeholder="miejscowość" name="miejscowosc" required>
                </div>
                <button type="submit" name="zamow">Zamów</button>
            </form>
</div>


</body>
</html>
