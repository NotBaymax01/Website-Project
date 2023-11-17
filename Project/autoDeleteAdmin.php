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
 $icNum=$_POST['icNum'];
	
 // sql to delete a record
 $sql = "DELETE FROM adminData WHERE icNum='$icNum'";
 if ($conn->query($sql) === TRUE) {
 echo '<script>
      alert("Remove Admin success");
      window.location.replace("adminMenu.html");
    </script>';
 }
 else {
 echo '<script>
      alert("Remove Admin Failure");
      window.location.replace("adminMenu.html");
    </script>'; $conn->error;
 }
 //close connection
 $conn->close();
?>

</body>
</html>