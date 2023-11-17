<html>
<head>
 <title>delete customer record</title>
</head>
<body>
<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketSystem";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error); 
 }
	
 //get input value
 $ticketNum=$_POST['ticketNum'];
	
 // sql to delete a record
 $sql = "DELETE FROM ticketData WHERE bil='$ticketNum'";
 if ($conn->query($sql) === TRUE) {
 echo '<script>
      alert("Ticket cancelation success");
      window.location.replace("adminMenu.html");
    </script>';
 }
 else {
 echo '<script>
      alert("Ticket cancelation success");
      window.location.replace("adminMenu.html");
    </script>'. $conn->error;
 }
 //close connection
 $conn->close();

 echo '<p><a href="adminMenu.php">Back to Main Menu</a></p>';
?>

</body>
</html>
