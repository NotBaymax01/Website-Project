<html>
<head>
    <title>register</title>
</head>
<body>
<?php
    extract($_POST);

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

    // Check if ICnum already exists
    $sqlCheck = "SELECT ICnum FROM adminData WHERE ICnum = '$icNum'";
    $resultCheck = $conn->query($sqlCheck);

    if ($resultCheck->num_rows > 0) {
        echo '<script>
                alert("This IC Number already exists. Please input a different IC Number");
                window.location.replace("signIn.html");
              </script>';
    } else {
        // Create query
        $sql = "INSERT INTO adminData (fullName, ICnum, jobTitle, telNum, email, password) VALUES ('$name', '$icNum', '$jobTitle', '$telNum', '$email', '$passwords')";

        // Execute query
        if ($conn->query($sql) === TRUE) {
            echo '<script>
                  alert("New record created successfully");
                  window.location.replace("adminMenu.html");
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
?>

<form class="button">
    <input type="button" name="back" onClick="window.location.replace('adminMenu.html')" value="back to menu">
</form>

</body>
</html>
