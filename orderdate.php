<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Orders By Date</title>
    <link rel="stylesheet" href="sheet.css">
</head>

<body>
    <?php
include 'connectdb.php';
?>
    <div class="homeicon">
        <p><a href="restaurant.php">Home</a></p>
    </div>
    <div id=home>
        <div class="top1">
            <p class="header1">Orders Grouped by Date</p>
        </div>
        <table class="styled-table">
            <?php
   $query = "SELECT orderDate, COUNT(*) as numOrders FROM customerorder GROUP BY orderDate";
   $result = $connection->query($query);
   echo "<tr><th>Date</th><th>Number of Orders</th></tr>";
   while ($row = $result->fetch()) {
        echo  "<tr><td>" . $row["orderDate"] . "</td><td align='center'>" . $row["numOrders"] . "</td></tr>";
   }
   echo "</table>";
   $connection =- NULL;
?>
        </table>
    </div>
</body>

</html>