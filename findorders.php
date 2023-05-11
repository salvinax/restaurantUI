<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Find Orders</title>
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
        <div class="top">
            <p class="header1">Find Orders</p>
            <p class="header2">Enter Date (format: YYYY-MM-DD)</p>
            <form action="" method="post">
                <input class="input1" type="text" name="orderDate"><br>
                <input class="btn1" type="submit" value="View Orders" name=submitbutton>
            </form>
        </div>

        <table class="styled-table">
            <tr>
                <th>Customer Name</th>
                <th>Items Ordered</th>
                <th>Total Amount</th>
                <th>Tip</th>
                <th>Delivery Employee</th>
            </tr>
            <?php
  if(isset($_POST['submitbutton'])){
    $whichDate= $_POST["orderDate"];
    if (empty($whichDate)){
      echo '<p class="errormsg">Field cannot be empty</p>';
      exit;
    }
    $query = 'SELECT customer.firstName, customer.lastName, itemName, totalPrice, tip, employee.firstName as deliveryName FROM customerorder, customer, ordercontains, employee WHERE customerorder.customerEmail=customer.email AND customerorder.orderId = ordercontains.orderId AND customerorder.deliveryId = employee.id AND customerorder.orderDate="' . $whichDate . '"';
    $result=$connection->query($query);
 
    if ($result !== null && $result->rowCount() > 0) {
             while ($row=$result->fetch()) {
                 echo "<tr><td>" . $row["firstName"]. " " . $row["lastName"]. "</td><td>" . $row["itemName"]. "</td><td>" . $row["totalPrice"]. "</td><td>" . $row["tip"]. "</td><td>" . $row["deliveryName"]. "</td></tr>";
             }
     } else {
         echo '<p class="errormsg">0 search results</p>';
     }
  }
 
$connection =- NULL;
?>
        </table>
    </div>

</body>

</html>