<html>
<head>
<meta charset="utf-8">
<title>remove admin</title>
	<style>
		form h2{
			font-size: 35px;
		}
		
		form .customer_ic{
			font-size: 28x;
			margin-bottom: 10px;
		}
		
	</style>
</head>
<body>
	<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "ticketsystem";
	
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
	
   // Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }
   //create and execute query
	
   $sql = "SELECT * FROM adminData";
   $result = $conn->query($sql);
	
   //check if records were returned
   if ($result->num_rows > 0) {
	   
   //create a table to display the record
   echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
   echo '<td align="center"><b>Name</b></td>
   <td align="center"><b>Ic Number</b></td>
   <td align="center"><b>Position</b></td>
   <td align="center"><b>Telephone Number</b></td>
   <td align="center"><b>Email</b></td></tr>';
	   
   // output data of each row
   while($row = $result->fetch_assoc()) {
   echo '<tr>';
   echo '<td align="center">'.$row["fullName"].'</td>';
   echo '<td align="center">'.$row["icNum"].'</td>';
	   echo '<td align="center">'.$row["jobTitle"].'</td>';
   echo '<td align="center">'.$row["telNum"].'</td>';
   echo '<td align="center">'.$row["email"].'</td>';
   echo '</tr>';
	   
   }
   }
   else {
   echo "0 results"; //if no record found in the database
   }
   //close connection
   $conn->close();
?>
	
	<form action="autoDeleteAdmin.php" method="post">
		<h2>Based on the table below, please enter the Ic Number to delete an Admin</h2>
		<input type="text" name="icNum" class="icNum" placeholder="IC Number Here" size="25"><br><br>
     	<input type="submit" name="submit" class="submit"><br>
    </form>
	
	<form action="adminMenu.html" method="post">
		<p><input type="submit" value="Back to Menu" name="back"></p><br>
	</form>
</body>
</html>
