<?php

require 'functions.php';
$connection = dbConnect();

$result =$connection->query('SELECT * FROM `products`');


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

        <section class="places-list">

        <?php foreach($result as $row): ?>
            <article class="places-list__place">
                <h2><?php echo $row ['naam']; ?></h2>
                <figure class="places-list__photo" style="background-image: url(img/<?php echo $row['foto']; ?>)"></figure>
                <header>
                    <h3><?php echo $row ['voorraad']; ?></h3>
                    <em><?php echo $row ['prijs']; ?></em>
                </header>
                <p><?php echo $row ['gegevens']; ?></p>
                <a href="details.php?id=<?php echo $row ['id']; ?>">meer info</a>
            </article>
        <?php endforeach; ?>

        </section>
    </div>
</body>
</html> 