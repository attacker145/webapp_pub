
<html>
<head>
<title>DATA custom_post.php</title>
</head>

<body>
	<?php
	   //session_start();
	   	
	   $servername = "cnktechlabscom.ipowermysql.com";
	   $username = "romanchak";
	   $password = "ipwpxno";
	   $dbname = "controllall";
	
	   // Create connection
	   $conn = new mysqli($servername, $username, $password, $dbname);
	   // Check connection
	   if ($conn->connect_error) {
	       die("Connection failed: " . $conn->connect_error);
	   }
  		$sensortemp = htmlspecialchars($_POST['temp']);		
		$Light = htmlspecialchars($_POST['Light']);
		$SN = htmlspecialchars($_POST['SN']);
		$BLE = htmlspecialchars($_POST['BLE']);       // UV status ON/OFF	
		$move = htmlspecialchars($_POST['move']);
		$IR1 = htmlspecialchars($_POST['IR1']);	      // "Human Detected" message
		$IR2 = htmlspecialchars($_POST['IR2']);	      // R Sensor
		$IR3 = htmlspecialchars($_POST['IR3']);	      // LED
		$IR4 = htmlspecialchars($_POST['IR4']);	
		$RoomT = htmlspecialchars($_POST['RoomT']);	  // Room temperature. Send from CC3200 and AMG8833
		$ms = htmlspecialchars($_POST['ms']);         // MAC address
		//$ms = hexdec($ms);
		$tablename = $_POST['TName'];//Table name "CGH" - post data to this table. The name is sent by the C-code
		//$tablename = "CGH";
		
		//$_SESSION['LEDstat'] = $BLE;

		// set the default timezone to use. Available since PHP 5.1
		date_default_timezone_set('America/Los_Angeles');
		$d_and_t = date(DATE_RFC2822);		
		if ($move != "clear SQL"){
		    $sql = "INSERT INTO " .$tablename. " (IR1, IR2, IR3, IR4, temp, light, RoomT, base, sample, time, BLE, ms) 
            VALUES ('$IR1','$IR2','$IR3', '$IR4', '$Light', '$sensortemp', '$RoomT', '$move', '$SN', '$d_and_t', '$BLE', '$ms')";
            if ($conn->query($sql) === TRUE) {
                echo " New record created successfully \n\r"; echo "<br>";                 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error; echo "\n\r"; echo "<br>";                
            }
		}

        if ($move == "clear SQL"){
            $sql = "DELETE FROM" .$tablename;
            
            if ($conn->query($sql) === TRUE) {
                echo "Records deleted successfully";                
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
        mysqli_close($conn);  
    ?>
<form method="get" action="grid.php">
    <input type="text" name="LEDstat" value="">
    <input type="submit">
</form>
</body>
</html>