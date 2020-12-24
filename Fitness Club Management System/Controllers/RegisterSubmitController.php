<?php

include __DIR__.'/../Model/BD.php';

//The function "htmlentities" control the xss attacks


$Name = htmlentities($_POST["Name"]);
$email = htmlentities($_POST["Email"]);
$Surname = htmlentities($_POST['Surname']);
$password = htmlentities($_POST['Password']);
//$number = htmlentities($_POST['Telefon']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $usuari=RegisterUser($Name, $Surname, $email, $password, '0000000', 0);

        if ($usuari == 1){
            include __DIR__.'/../View/Registered.php';
        }
        else{
            include __DIR__.'/../View/alreadyRegistered.php';
        }

    } else {
        include __DIR__.'/../View/IncorrectValues.php';

    }
}
