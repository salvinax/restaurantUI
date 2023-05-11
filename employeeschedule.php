<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Employee Schedule</title>
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
        <p class="header1">Employee Schedule</p>
        <div class="middle">
            <form action="" method="post">
                <select name="employee">
                    <?php

   $query = "SELECT firstName, lastName, id FROM employee";
   $result = $connection->query($query);

   while ($row = $result->fetch()) {
        echo '<option value="' . $row["id"] . '"';
        if(isset($_POST['employee']) && $_POST['employee'] == $row["id"]) echo 'selected="selected"';
        echo  '">' .$row["firstName"] . " " . $row["lastName"] . "</option>";
   }
  
?>
                </select>
                <input class="btn2" type="submit" value="Get Schedule" name="employeebtn">
            </form>
            <div class="tablediv">
                <table class="styled-table">
                    <tr>
                        <th>Day</th>
                        <th>Starts</th>
                        <th>Ends</th>
                    </tr>
                    <?php
   if(isset($_POST['employeebtn'])){
   $whichEmployee= $_POST["employee"];
   $query = 'SELECT shiftDay, startTime, endTime FROM shift WHERE shiftDay not in ("Saturday","Sunday") AND employeeID="' . $whichEmployee . '"';
   $result=$connection->query($query);
   if ($result->rowCount() > 0){
    
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["shiftDay"]."</td><td>".$row["startTime"]."</td><td>". $row["endTime"]. "</td></tr>";
    } 
  }else {
   echo '<p class="errormsg1">No shift this week</p>';
 }
}
$connection =- NULL;
?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>