<html>
<head>
 <title>view User Info</title>
</head>
<body>
 <h1 align="center">Customer Information</h1>
<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "ticketsystem";
	
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
	
	// create variable to calculate total ticket sold
	   $totalTicketsold = 0;
	   $totalSellPrice = 0;
	
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
   <td align="center"><b>Telephone Number</b></td>
   <td align="center"><b>Email</b></td>
   <td align="center"><b>Match Name</b></td>
   <td align="center"><b>Number of Ticket</b></td>
   <td align="center"><b>Payment Type</b></td>
   <td align="center"><b>Total Price</b></td></tr>';
	   
   // output data of each row
   while($row = $result->fetch_assoc()) {
   echo '<tr>';
   echo '<td align="center">'.$row["bil"].'</td>';
   echo '<td align="center">'.$row["name"].'</td>';
   echo '<td align="center">'.$row["icNum"].'</td>';
   echo '<td align="center">'.$row["telNum"].'</td>';
   echo '<td align="center">'.$row["email"].'</td>';
   echo '<td align="center">'.$row["matchName"].'</td>';
   echo '<td align="center">'.$row["numOfTicket"].'</td>';
   echo '<td align="center">'.$row["paymentType"].'</td>';
   echo '<td align="center">'.$row["totalPrice"].'</td>';
   echo '</tr>';
	   
	   $totalTicketsold = $totalTicketsold + $row["numOfTicket"];
   }
	$totalSellPrice = 30 * $totalTicketsold;
   }
   else {
   echo "0 results"; //if no record found in the database
   }
	
	echo '<form action="adminMenu.html" method="post"><p><input type="submit" value="Back to Menu" name="back"></p></form>';
	echo '<h2 style="color: red">Total Ticket sold: ' . $totalTicketsold . '</h2>';
	echo '<h2 style="color: red">Total Profit: RM' . $totalSellPrice . '</h2><br>';
   //close connection
   $conn->close();
?>
</body>
</html>
