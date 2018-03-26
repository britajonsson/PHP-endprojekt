<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>API-finder</title>
</head>
<body class="container">
    <h1>The API user</h1>
    
<table class="table">
<tr><th>Artikelnummer</th><th>Namn</th><th>Beskrivning</th><th>Bild</th><th>Pris</th></tr>
    <?php
        $endpoint = "http://localhost/Projekt/api/products/"; // for running locally
        // $endpoint = "https://php-projekt.000webhostapp.com/api/products/"; // for 000webhostapp.com

        $data = file_get_contents($endpoint);
        $table = json_decode($data, true);

        // Test print of array
        /* 
        echo "<pre>";
        print_r($table);
        echo "</pre>";
         */

        foreach ($table as $key => $value ) : ?>
<tr>
<td><?= $value['articleID']; ?></td>
<td><?= $value['title']; ?></td>
<td><?= $value['description']; ?></td>
<td><img src='<?= $value['picture']; ?>' class="img"></td>
<td><?= $value['price']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<div class="row justify-content-center">
<div class="col-md-4">
<h3>Alla produkter</h3>
<ul>
<?php foreach ($table as $key => $value) : ?>
<li><?= $value['title']; ?></li>
<?php endforeach;?>
</ul>
</div>

<div class="col-md-3">
<h3>Alla bilder</h3>
<ul>
<?php foreach ($table as $key => $value) : ?>
<li><img src='<?= $value['picture']; ?>' class="img"></li>
<?php endforeach;?>
</ul>
</div>

<div class="col-md-4">
<h3>Alla priser</h3>
<ul>
<?php foreach ($table as $key => $value) : ?>
<li><?= $value['title'] . " - " . $value['price']; ?></li>
<?php endforeach;?>
</ul>
</div>
</div>

</body>
</html>