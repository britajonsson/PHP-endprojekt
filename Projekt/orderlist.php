<?php
    // includes html, head, body etc.
    include "header.php";

    // Connection to database
    require_once("connect.php");
?>

<h2>Orderlista</h2>

<table class="table table-striped" id="orderlist">
    <tr>
        <th>Order</th>
        <th>Förnamn</th>
        <th>Efternamn</th>
        <th>E-post</th>
        <th>Mobilnummer</th>
        <th>Gata</th>
        <th>Postnr</th>
        <th>Ort</th>
        <th>Artikelnr</th>
        <th>Titel</th>
        <th>Pris</th>
    </tr>
    <?php
    // Create SQL-query to show orderlist data
    $orderlistQuery = "SELECT * FROM orderlist, product WHERE orderlist.articleID = product.articleID ORDER BY orderID";

    // Run SQL-query in database
    $orderTable = mysqli_query($connection, $orderlistQuery) or die(mysqli_error($connection));
    
    // Create table rows with the data
    while ($row = $orderTable->fetch_assoc()) :
    ?>
    
    <tr>
        <td><?= $row['orderID']; ?></td>
        <td><?= $row['firstname']; ?></td>
        <td><?= $row['lastname']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td><?= $row['street']; ?></td>
        <td><?= $row['zipcode']; ?></td>
        <td><?= $row['city']; ?></td>
        <td><?= $row['articleID']; ?></td>
        <td><?= $row['title']; ?></td>
        <td><?= $row['price'] . " kr" ?></td>
    </tr>

    <?php endwhile; ?>
</table>

<?php 
include "tostart.php";
include "footer.php";
?>