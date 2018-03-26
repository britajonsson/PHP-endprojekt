<?php
// includes html, head, body etc.
include "header.php";
?>

<h1>Tvångstankesmedjan</h1>
<p class="pl-4 text-right font-italic">- din tvångstanke på nätet</p>
<hr>

<p class="pl-2">Har du någonsin känt att ditt liv varit <strong>händelselöst</strong>, <strong>tråkigt</strong> och <strong>okomplicerat</strong>?</p>
<p class="pl-2">Önskar du ibland att du hade lite mer <strong>utmaningar</strong> i din vardag för att <strong>utvecklas</strong> som person?</p>
<p class="pl-2">Varför inte krydda ditt liv med en tvångstanke! Du är bara några klick ifrån ett helt nytt perspektiv på ditt liv. <strong>Vad väntar du på?</strong></p>
    
<?php
    require_once("connect.php");

    $getAllProductsQuery = "SELECT * FROM product";

    $products = mysqli_query($connection, $getAllProductsQuery) or die(mysqli_error($connection));

    echo "<table class='table table-striped'>";
    echo "<tr><th>Titel</th><th>Beskrivning (samt vad som ingår)</th><th>Bild</th><th>Pris</th><th></th></tr>";
    foreach ($products as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['title'] . "</td>";
        echo "<td>" . $value['description'] . "</td>";
        echo "<td class='image'><img class='img-thumbnail' src='images/" . $value['picture'] . "'></td>";
        echo "<td class='price'>" . $value['price'] . " kr</td>";
        // A form inside table to be able to post data to buy
        echo "<td><form action='buy.php' method='post'>";
        echo "<input type='hidden' name='articleID' value='" . $value['articleID'] . "'>";
        echo "<input type='hidden' name='title' value='" . $value['title'] . "'>";
        echo "<input type='hidden' name='description' value='" . $value['description'] . "'>";
        echo "<input type='hidden' name='picture' value='" . $value['picture'] . "'>";
        echo "<input type='hidden' name='price' value='" . $value['price'] . "'>";
        echo "<input type='submit' value='Köp' class='btn btn-outline-info'>";
        echo "</form></td>";
        echo "</tr>";
    }

    echo "</table>";

?>

<a href="orderlist.php" class="btn btn-outline-info d-block mx-auto">Visa alla ordrar</a>
<br>

<?php 
include "footer.php";
?>