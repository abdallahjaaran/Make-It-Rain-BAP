<?php

require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam  = '';
$email = '';
$bericht = '';

$errors = [];

if($_SERVER ['REQUEST_METHOD'] == "POST") {
    $voornaam = $_POST['voornaam'];
    $achternaam  = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $tijdstip = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `contact` (`voornaam`, `achternaam`, `email`, `bericht`, `tijdstip`) 
            VALUES (:voornaam, :achternaam, :email, :bericht, :tijdstip);";
    
    $statement = $connection->prepare($sql);
    $params = [
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'email' => $email,
        'bericht' => $bericht,
        'tijdstip' => $tijdstip
    ];
    $statement->execute($params);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container place-details">
        <h1>Test</h1>

        <section class="contact">

            <header>
                <h2>Have a question?</h2>
            </header>

            <form action="contact.php" method="POST">
                <div class="form__field">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" id="voornaam" name="voornaam" placeholder="Vul uw naam in" required>
                </div>
                <div class="form__field">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" id="achternaam" name="achternaam" placeholder="Vul uw achternaam in" required>
                </div>
                <div class="form__field">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Vul uw email in" required>
                </div>
                <div class="form__field">
                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" placeholder="Vul uw vraag of bericht in" required></textarea>
                </div>
                <button type="submit" class="form__button">Opsturen</button>
            </form>

        </section>

    </div>
</body>
</html> 