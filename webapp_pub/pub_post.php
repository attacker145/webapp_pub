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
	    $EBT = htmlspecialchars($_POST['base']);//Elevated body tmperature
	    $sensortemp = htmlspecialchars($_POST['temp']);//Motion SNSR1
	    $Light = htmlspecialchars($_POST['Light']);//Motion SNSR2
	    $mean_SNSR1 = htmlspecialchars($_POST['SN']);//mean_SNSR1
		$BLE = htmlspecialchars($_POST['BLE']);// LED		
		$move = htmlspecialchars($_POST['move']);
		$IR1 = htmlspecialchars($_POST['IR1']);	// IR1
		$IR2 = htmlspecialchars($_POST['IR2']);	// IR2
		$IR3 = htmlspecialchars($_POST['IR3']);	// IR3
		$IR4 = htmlspecialchars($_POST['IR4']);	// IR4
		$RoomT = htmlspecialchars($_POST['RoomT']);	
		$ms = htmlspecialchars($_POST['ms']);//MAC address. ID
		$ms = hexdec($ms);
		$tablename = $_POST['TName'];//post data to this table
		$smpl = htmlspecialchars ($_POST['smpl']);// Sample number string
		//$smpl = (int) $smpl;
		
		$IR1 = $IR1 & 0xFFFF; // only use bottom 16 bits. Turns variale to numeric
		if (0x8000 & $IR1) {
		    $IR1 = - (0xFFFF - $IR1 + 1);
		}
		$IR2 = $IR2 & 0xFFFF; // only use bottom 16 bits
		if (0x8000 & $IR2) {
		    $IR2 = - (0xFFFF - $IR2 + 1);
		}
		$IR3 =$IR3 & 0xFFFF; // only use bottom 16 bits
		if (0x8000 & $IR3) {
		    $IR3 = - (0xFFFF - $IR3 + 1);
		}
		$IR4 = $IR4 & 0xFFFF; // only use bottom 16 bits
		if (0x8000 & $IR4) {
		    $IR4 = - (0xFFFF - $IR4 + 1);
		}
		
		//$mean_SNSR1 = $mean_SNSR1 & 0xFFFF;
		//if (0x8000 & $mean_SNSR1) {
		//    $mean_SNSR1 = - (0xFFFF - $mean_SNSR1 + 1);
		//}
		$mean_SNSR1 = $mean_SNSR1/617;//617 counts per inch		
		$mean_SNSR1 = round($mean_SNSR1,1);
//		$IR_AVE = ($IR1 + $IR2 + $IR3 + $IR4)/4;
//		if ($IR_AVE > 550 and $mean_SNSR1 > 10000){
//		    $EBT = "EBT";
//		}else{
//		    $EBT = " ";
//		}
		if (strpos($EBT, 'EBT') !== false) {
		    $EBT = 'EBT';
		}else{
		    $EBT = ' ';
		}
		if (strpos($sensortemp, 'X') !== false) {//" & temp=X "
		    $sensortemp = 'X';
		}else{
		    $sensortemp = ' ';
		}
		if (strpos($Light, 'X') !== false) {
		    $Light = 'X';
		}else{
		    $Light = ' ';
		}
		// set the default timezone to use. Available since PHP 5.1
		date_default_timezone_set('America/Los_Angeles');
		$d_and_t = date(DATE_RFC2822);		
		if ($move != "clear SQL"){
		    //$sql = "INSERT INTO " . $tablename . " (IR1, IR2, IR3, IR4, temp, light, RoomT, base, sample, time, BLE, ms) 
		    $sql = "INSERT INTO controllall (IR1, IR2, IR3, IR4, temp, light, RoomT, base, sample, time, BLE, ms)
            VALUES ('$IR1','$IR2','$IR3', '$IR4', '$sensortemp', '$Light',  '$RoomT', '$EBT', '$mean_SNSR1', '$d_and_t', '$BLE', '$ms')";
            if ($conn->query($sql) === TRUE) {
                echo " New record created successfully \n\r"; echo "<br>";                 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error; echo "\n\r"; echo "<br>";                
            }
		}

        if ($move == "clear SQL"){
            $sql = "DELETE FROM" . $tablename;
            
            if ($conn->query($sql) === TRUE) {
                echo "Records deleted successfully";                
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
        mysqli_close($conn);  
        
        $headerfile = fopen("header.txt", "w") or die("Unable to open file!");
        $headercontent = "IR1 IR2 IR3 IR4 RT(C) EBT Dist (inch) DT LED ID";
        fwrite($headerfile, $headercontent);
        fclose($headerfile);
        
        //$BLE has the UVC light status
        $myfile = fopen("xml.txt", "w") or die("Unable to open file!");
        $content = "$IR1 $IR2 $IR3 $IR4 $BLE" . " Room Temperature:" . "$RoomT $EBT $mean_SNSR1 $d_and_t $ms $sensortemp";
        fwrite($myfile, $content);
        fclose($myfile);
        
        
        $myfile = fopen("dist.txt", "w") or die("Unable to open file!");// Create dist.txt
        $content = "$mean_SNSR1 $ms";                                   // Get mean distance value
        fwrite($myfile, $content);                                      // Write mean distance value
        fclose($myfile);
        echo "Sample Number: " . $smpl;
        
        //Current time stamp
        $myfile = fopen("time.txt", "w") or die("Unable to open file!");// Create time.txt
        $t=time();
        $content = "$t";                                                // Get mean distance value
        fwrite($myfile, $content);                                      // Write mean distance value
        fclose($myfile);
        
        //Room temperature
        $myfile = fopen("temperature.txt", "w") or die("Unable to open file!"); // Create temperature.txt
        $content = "$RoomT $ms";                                                // Get room temperature value and ID
        fwrite($myfile, $content);                                              // Write room temperature value
        fclose($myfile);
    ?>
<form method="get" action="grid.php">
    <input type="text" name="LEDstat" value="">
    <input type="submit">
</form>
</body>
</html>