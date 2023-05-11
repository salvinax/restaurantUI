<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add Customer</title>
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
        <p class="header1">Add a New Customer</p>
        <div class="de">
            <form action="" method="post">

                <div>
                    <label for="firstname">First Name</label>
                    <input class="in" type="text" name="firstname">
                </div>

                <div>
                    <label for="lastname">Last Name</label>
                    <input class="in" type="text" name="lastname">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input class="in" type="text" name="email">
                </div>

                <div>
                    <label for="phonenumber">Phone Number</label>
                    <input class="in" type="text" name="phonenumber">
                </div>

                <div>
                    <label for="street">Street</label>
                    <input class="in" type="text" name="street">
                </div>

                <div>
                    <label for="pc">Postal Code</label>
                    <input class="in" type="text" name="pc">
                </div>
        </div>

        <div class="last">
            <label for="city">City</label>
            <input class="in" type="text" name="city">
        </div>

        <input class="btn1" type="submit" value="Add Customer" name="customerbtn">
        </form>







        <?php
if(isset($_POST['customerbtn'])){
   $firstname= $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $email = $_POST["email"];
   $pc = $_POST["pc"];
   $city = $_POST["city"];
   $street = $_POST["street"];
   $phone = $_POST["phonenumber"];
   $newcredit = 5.00; 
   $intial = 0.00; 

   if (empty($email) || empty($firstname) || empty($lastname) || empty($pc) || empty($city) || empty($street) || empty($phone)) {
      echo '<p class="errormsg">Field(s) cannot be empty</p>';
    exit;
  }

   $query1 = 'SELECT email FROM customer WHERE email = "' . $email . '"';
   $result1 = $connection->query($query1);

   if ($result1->rowCount() > 0){
      echo '<p class="errormsg">Customer Already Exists</p>';
    exit; 
   } 

   $query2 = 'INSERT INTO customer values("' . $email . '","' . $phone . '","' . $street . '","' . $city . '","' . $pc . '","' .$firstname. '","' .$lastname.'")';
   $result2 = $connection->query($query2);

   if ($result2 == null) {
      echo '<p class="errormsg">Error Adding Customer</p>';
    exit; 
   }

   $query3 = 'INSERT INTO payment values("' . date("Y-m-d") . '","' . $intial . '","' . $email . '","' . $newcredit .'")';
   $result3 = $connection->query($query3);
   echo '<p class="errormsg">Customer was added to the database</p>';
   $connection = NULL;
}
?>

    </div>
</body>

</html>