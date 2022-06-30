<?php

require 'functions.php';
$connection = dbConnect();

if( !isset($_GET['id'])) {
    echo "De ID is niet gezet";
    exit;
}

$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false) {
    echo "Dit is geen getal (integer)";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `products` WHERE id=?');
$params = [$id];
$statement->execute($params);
$place = $statement->fetch(PDO::FETCH_ASSOC);

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
    <div class="container">
        <h1>Test</h1>

        <section>
            <article class="place-info">
                <header>
                    <h2><?php echo $place['naam']?></h2>
                    <h2><?php echo $place['voorraad']?></h2>
                </header>
                <figure style="background-image: url(images/<?php echo $place['foto']?>)">
                    <em>€ 20.95</em>
                </figure>
                <p>
                    <?php echo $place['gegevens']?>
                </p>
                <hr>
                <a href="contact.php" class="link-button">Neem contact op!</a>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="places-sidebar">
                <h3>Andere soorten</h3>
                <ul>
                    <li>Switch lite</li>
                    <li>Switch pro</li>
                    <li>Switch</li>
                    <li>Switch old</li>
                </ul>
            </aside>
        </section>
        
    </div>

    </div>
</body>
</html> 