<html>
<head>
<title>receipt</title>
	<style>
		* { 
        padding: 0; 
        margin: 0; 
        box-sizing: border-box; 
    	}

    	.container{
			width: 100%;
			background-image: url("paymentbg.jpg");
			background-size: cover;
			background-repeat: no-repeat;
		}
		
		.navbar{
        display: flex; 
        align-items: center;
        background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(255,0,212,1), rgba(0,221,255,1));
    	}

        .logo{
            height: 50px;
            margin-left: 30px;
        }

        nav{
            flex: 1;
            text-align: right;
        }

        nav ul li{
            list-style: none;
            display: inline-block;
            margin-left: 5px;
        }

        nav ul li a{
            text-decoration: none;
            color: black;
            font-size: 20px;
            padding-right: 150px;
        }

        nav ul li a:hover{
            opacity: 0.6;
        }

        .bolaLogo{
            height: 80px;
            margin-left: 73%;
		}
		
		.receipt{
			display: flex;
			margin-top: 35px;
		}
		
		h2{
            font-size: 45px;
            text-align: center;
			color: white;
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif"
		}
		
		h3{
			text-align: center;
			font-size: 35px;
            text-align: center;
            margin-bottom: 15px;
			color: red;
			text-decoration: underline;
		}
		
		.CustomerInfo{
			border-radius: 6px;
			margin-left: 18%;
			width: 29vw;
			height: 45vh;
			background-color: white;
		}
		
		.info{
			font-size: 22px;
			margin-left: 25px;
			margin-bottom: 8px;
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
		}
		
		.MatchInfo{
			border-radius: 6px;
			margin-left: 20%;
			width: 30vw;
			height: 40vh;
			background-color: white;
		}
		
		.affLogo{
			height: 70px;
			margin-bottom: 15px;
			margin-left: 26%;
		}
		
		button {
            padding: 12px 48px;
            border-radius: 40px;
            margin-top: 30px; 
            cursor: pointer;
            color: black;
            font-size: 15px;
            border-radius: 1rem;
            border: none;
            position: relative;
            background: #ffffff;
            transition: 0.1s;
            width: 250px;
			margin-left: 40%;
			margin-bottom: 6%;
            }
		
		.socialMedia{
			height: 10%;
			display: flex; 
        	align-items: center;
        	background:#000000;
		}
		
		.socialMedia nav{
			flex: 1;
			text-align: right;
			padding-left: 100px;
		}
		
		.socialMedia nav ul li{
			list-style: none;
			display: inline-block;
			
		}
		
		.fb-icon{
			height: 50px;
			cursor: pointer;
		}
		
		.ig-icon{
			height: 50px;
			cursor: pointer;
		}
		
		.twitter-icon{
			height: 50px;
			cursor: pointer;
		}
		
		footer {
			display: block;
			height: 50hv;
 			padding: 3px;
			text-align: right;
  			background-color: black;
  			color: white;
		}
	</style>
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
	
	 //create query
	 $sql = "INSERT INTO ticketdata (icNum, name, telNum, email, matchName, numOfTicket, paymentType, totalPrice) VALUES ('$icNum', '$name',  '$telNum', '$email','$matchType', '$numOfTicket', '$paymentType', '$totalPriceDatabase')";

	 //execute query
	 if ($conn->query($sql) === TRUE) {
		 echo '<script>
              alert("Purchase Complete");
    		</script>';
		 
		 
	 }
	 else {
	 echo "Error: " . $sql . "<br>" . $conn->error;
	 }
	
	// fetch match data
    $sql2 = "SELECT * FROM matchData WHERE matchName = '$matchType'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $matchDate = $row["date"];
            $matchTime = $row["time"];
            $matchVenue = $row["venue"];
        }
    } else {
        echo "No matching records found.";
    }

    // close connection
    $conn->close();
?>
	<div class="container">
          <div class="navbar">
			  <img src="thlogo.png" class="logo">
			  <img src="bolaLogo.png" class="bolaLogo">
          </div>
		
          <h2>Thank you for purchasing with us</h2>
		<h2> Receipt has been send to your email</h2>
			<div class="receipt">
          <div class="CustomerInfo">
              <h3>Customer Receipt</h3>
              <div class="info">
				  <b>Name</b>
				  <b>: <?php print($name) ?><b>
			  </div>
			  
			  <div class="info">
				  <b>IC Number</b>
				  <b>: <?php print($icNum) ?><b>
			  </div>
			
              <div class="info">
				  <b>Telephone Number</b>
				  <b>: <?php print($telNum) ?><b>
			  </div>
			  
		      <div class="info">
				  <b>Email</b>
				  <b>: <?php print($email) ?><b>
			  </div>
			  
			  <div class="info">
				  <b>Match Name</b>
				  <b>: <?php print($matchType) ?><b>
			  </div>
					  
			  <div class="info">
				  <b>Number Of Ticket</b>
				  <b>: <?php print($numOfTicket) ?><b>
			  </div>
			
			  <div class="info">
				  <b>Payment Type</b>
				  <b>: <?php print($paymentType) ?><b>
			  </div>
					  
			  <div class="info">
				  <b>Total Price</b>
				  <b>: <?php print($totalPriceDatabase) ?><b>
			  </div>
            </div>

            <div class="MatchInfo">
              <h3>Ticket Detail</h3>
			  <img src="AFF logo.png" class="affLogo">
				
			  <div class="info">
				  <b>Match Name</b>
				  <b>: <?php print($matchType) ?><b>
			  </div>
					  
			  <div class="info">
				  <b>Match Date</b>
				  <b>: <?php print($matchDate) ?><b>
			  </div>
			
			  <div class="info">
				  <b>Match Time</b>
				  <b>: <?php print($matchTime) ?><b>
			  </div>
					  
			  <div class="info">
				  <b>Match Venue</b>
				  <b>: <?php print($matchVenue) ?><b>
			  </div>
			</div>
         </div>
		<button type="button" onClick="document.location='home.html'">Back to Home</button><br>
        <div class="socialMedia">
            <nav>
              <ul>
                 <li><a href="https://www.facebook.com/tickethotline/" target="_blank"><img src="fb-icon.png" class="fb-icon"></a></li>
                <li><a href="https://www.instagram.com/ticket.hotline/" target="_blank"><img src="ig-logo.png" class="ig-icon"></a></li>
                 <li><a href="https://twitter.com/tickethotline?lang=en" target="_blank"><img src="twitter-logo.png" class="twitter-icon"></a></li>
              </ul>
            </nav>
        </div>
    </div>
</body>
<footer>
	<p>By Hairolakma Danish. All right reserved. copyright &#169; 2023.</p>
</footer>
</html>