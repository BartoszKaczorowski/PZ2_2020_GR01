<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--  do używania collapse - FAQ  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--	do używania ikon z FontAwesome   -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--	import czcionek z GoogleFonts   -->
    <link
        href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:300,700|Saira:300,400&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
     <!--    biblioteka AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- moje style css -->
    <link rel="stylesheet" href="style.css">
    <title>Mniam</title>
</head>

<body>
    <header>
        <!--_______________ DIV NA GÓRZE STRONY Z NAZWA I PRZYCISKIEM LOGOWANIA _______________-->
        <div class="LoginAndRegistration">
            <p class="title">Mniam</p>
            <!-- <button class="Login"
                onclick="document.getElementById('modalElement').style.display='block'">Zaloguj</button> -->
            <button class="Login" onclick="myFunction()">Zaloguj</button>
        </div>

         <!--_______________JEŻELI WYSTĄPI BŁĄD PODCZAS LOGOWANIA WYŚWIETLAM ALERT_______________-->

            <?php 
            if(@$_GET['Invalid']==true)
            {
            ?>

            <div style="margin-top:10px;" class=" col-md-4 col-md-offset-4"" role="alert">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Niepoprawny login lub hasło.</br>
                    Spróbuj ponownie.
                </div>
            </div>

            <?php
            }
            ?>

<!--_______________JEŻELI REJESTRACJA PRZEBIEGŁA POMYŚLNIE WYŚWIETLAM ALERT_______________-->

            <?php
            if (@$_GET['registered'] == 'true')
            {
            ?>
            <div style="margin-top:15px;" class=" col-md-5 col-md-offset-4"" role="alert">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Rejestracja zakończona sukcesem. </br>
                    Możesz się zalogować.   
                </div>
            </div>
            <?php
            }
            ?>

        <div id="modalElement" class="modal">
            <!--_______________ OKNO MODELNAE Z FORMULARZEM LOGOWANIA _______________-->
            <form class="modal-content animate" action="process.php" method="post">

                <span onclick="document.getElementById('modalElement').style.display='none'" class="close"
                    title="Zamknij">&times;</span>
<p class="zaloguj">Zaloguj się</p>
                <div class="containerInput">
                    <input type="text" placeholder="Nazwa użytkownika" name="Username" required>
                    <input type="password" placeholder="Hasło" name="Password" required>
                </div>
<!-- type="submit" value="Login" name="submit" -->
                <button id="loginToAccount" value="Login" type="submit" name="Login">Zaloguj</button>
                <div class="newUser">
                    <p>Jesteś nowym użytkownikiem Mniam.pl? </p>
                    <!--<a class="login2" href="">Zarejestruj się</a> -->
                    <button class="register" onclick="myFunction2()">Rejestracja</button>
                </div>
            </form>
        </div>


        <!--_______________ OKNO MODELNAE Z FORMULARZEM REJESTRACJI _______________-->


        <div id="modalElement2" class="modal2">
            <!--_______________ OKNO MODELNAE Z FORMULARZEM _______________-->
            <form class="modal-content animate" action="insert.php" method="post">

                <span onclick="document.getElementById('modalElement2').style.display='none'" class="close"
                    title="Zamknij">&times;</span>
                <p>Zarejestruj się</p>
                <div class="containerInput2">
                    <input type="text" placeholder="Nazwa użytkownika" name="username" required>
                    <input type="password" placeholder="Hasło" name="password" required>
                    <input type="password" placeholder="Powtórz hasło" name="confirm_password" required>
                </div>

                <input style="margin-top:110px;" id="registerAccount" name="Register" value="Rejestracja"
                    type="submit" onclick="document.getElementById('modalElement2').style.display='block'">

            </form>
        </div>

    </header>
    
    <!--_______________JEŻELI HASŁA PRZY REJESTRACJI NIE SĄ TAKIE SAME _______________-->

        <?php
         if (@$_GET['registered'] == 'false')
         {
        ?>
        <div style="margin-top: 15px;" class=" col-md-4 col-md-offset-4"" role=" alert">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Hasła się nie zgadzają. <br />
                Spróbuj ponownie.
            </div>
        </div>
        <?php
         }
 ?>

        <!--_______________JEŻELI NAZWA UŻYTKOWNIKA JUŻ ISTNIEJE_______________-->

        <?php
         if (@$_GET['Username'] == 'false')
         {
        ?>
        <div style="margin-top: 15px;" class=" col-md-4 col-md-offset-4"" role=" alert">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Użytkownik o tej nazwie istnieje <br />
                Wybierz inną nazwę użytkownika.
            </div>
        </div>
        <?php
         }
 ?>

    <!--_______________ SEKCJA ZE ZDJĘCIEM NA STRONIE 'POWITALNEJ' _______________-->
    <section class="mainImage"></section>

    <!--_______________ SEKCJA - 'DZIAŁANIE APLIKACJI' _______________-->

    <h2>Jak działa aplikacja?</h2>

    <section class="Instruction">

        <div class="HowToUseApp" data-aos="zoom-in">
            <div id="picture" class="HowToUseAppPicture1"></div>
            <p >Wybierz jedzenie</p>
        </div>

        <div class="HowToUseApp" data-aos="zoom-in">
            <div id="picture" class="HowToUseAppPicture2"></div>
            <p>Podaj adres dostawy</p>
        </div>

        <div class="HowToUseApp" data-aos="zoom-in">
            <div id="picture" class="HowToUseAppPicture3"></div>
            <p>Zapłać i czekaj</br>na dostawę</p>
        </div>

    </section>

    <!--_______________ SEKCJA - O APLIKCAJI MOBILNEJ _______________-->

    <section class="MobileApp">
        <p>Skorzystaj z aplikacji Mniam.pl</p>
        <div class="orderFood"></div>
    </section>

    <!--_______________ SEKCJA - FAQ _______________-->


    <section class="faq">
        <h2>FAQ</h2>
        <a href="#description1" data-toggle="collapse">
            <i class="fas fa-angle-down"></i>W jaki sposób można zapłacić za transakcję?</a>
        <div id="description1" class="collapse">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ex doloremque, suscipit sed non commodi.
        </div>
        <a href="#description2" data-toggle="collapse">
            <i class="fas fa-angle-down"></i>Ile trzeba czekać na dostarczenie jedzenia we wskazany adres?</a>
        <div id="description2" class="collapse">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ex doloremque, suscipit sed non commodi.
        </div>
        <a href="#description3" data-toggle="collapse">
            <i class="fas fa-angle-down"></i>Jak można złożyć reklamację po nieudanym zamówieniu jedzenia?</a>
        <div id="description3" class="collapse">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ex doloremque, suscipit sed non commodi.
        </div>
    </section>

    <!-- _______________ SECTION KONTAKT _______________ -->

    <section class="contact">
        <h2 class="titleContact">Skontaktuj się z nami</h2>
        <form action="contactform.php" method="POST">
            <input type="text" name="name" placeholder="Twoje imię">
            <input type="text" name="mail" placeholder="Twój email">
            <input type="text" name="subject" placeholder="Temat">
            <textarea name="message" placeholder="Treść wiadomości"></textarea>
            <button class="submitContact" type="submit" name="submit">Wyślij</button>
        </form>
    </section>

    <!-- _______________ SOCIAL MEDIA _______________ -->




    <footer></footer>

    <script src="file.js">
    </script>

</body>

</html>
