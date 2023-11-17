<html>
<head>
<title>register</title>
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
	
	 // Define $myusername and $mypassword
    $IcNum=$_POST['icNum'];
    $mypassword=$_POST['password'];
	
    $sql = "SELECT ICNum, Password FROM adminData WHERE ICNum='$IcNum' and Password='$mypassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
         header("location: adminMenu.html");
    }
    else
    {
       echo '<script>
              alert("Wrong IC Number or Password. Please try again");
              window.location.replace("LogIn.html");
    		</script>';
    }
    $conn->close();
 ?> 
	
</body>
</html>
