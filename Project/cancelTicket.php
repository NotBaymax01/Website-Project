<html>
<head>
<meta charset="utf-8">
<title>ticket cancelation</title>
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
	
   $sql = "SELECT * FROM ticketData";
   $result = $conn->query($sql);
	
   //check if records were returned
   if ($result->num_rows > 0) {
	   
   //create a table to display the record
   echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
   echo '<td align="center"><b>Ticket Id Number</b></td>
   <td align="center"><b>Name</b></td>
   <td align="center"><b>Ic Number</b></td>
   <td align="center"><b>Match Name</b></td>
   <td align="center"><b>Total Price</b></td></tr>';
	   
   // output data of each row
   while($row = $result->fetch_assoc()) {
   echo '<tr>';
   echo '<td align="center">'.$row["bil"].'</td>';
   echo '<td align="center">'.$row["name"].'</td>';
   echo '<td align="center">'.$row["icNum"].'</td>';
   echo '<td align="center">'.$row["matchName"].'</td>';
   echo '<td align="center">'.$row["totalPrice"].'</td>';
   echo '</tr>';
	   
   }
   }
   else {
   echo "0 results"; //if no record found in the database
   }
   //close connection
   $conn->close();
?>
	
	<form action="deleteCusRecord.php" method="post">
		<h2>Based on the table below, please enter the ticket Id number to cancel the ticket</h2>
		<input type="text" name="ticketNum" class="ticketNum" placeholder="Ticket Number Here" size="25"><br><br>
     	<input type="submit" name="submit" class="submit"><br>
    </form>
	
	<form action="adminMenu.html" method="post">
		<p><input type="submit" value="Back to Menu" name="back"></p><br>
	</form>
</body>
</html>
