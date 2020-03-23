<?php

// OBSŁUGA FORMULARZA KONTAKTOWEGO

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "gorski619@wp.pl";
    $headers = "From: ".$mailFrom;
    $txt = $message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: index.php?mailsend");

}