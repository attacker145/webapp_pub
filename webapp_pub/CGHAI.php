
<!DOCTYPE html>
<html lang="en">
<head>
<style>
#dialog-window {
  height: 200px;
  border: 1px black solid;
}

#scrollable-content {
  height: 180px;
  overflow: auto;
  background-color: white;
}

#footer {
  height: 20px;
  background-color: green;
}
</style>
</head>
<body>
<?php


function readSQL() {   
    $header = "
<!DOCTYPE html>
<html lang=\"en\">
<head>
  <title> </title>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <meta name=\"description\" content=\"http, softrware, opamp, operational, amplifier, adder, simulation,Test, measurement, electronics\">
  <meta name=\"keywords\" content=\"CC3200, adder, simulation, tina\">
  <!--<meta http-equiv=\"refresh\" content=\"2\" />-->
  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css\">
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"></script>
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
  <script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>
    
  <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
  <link rel=\"stylesheet\" href=\"/resources/demos/style.css\">
  <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
  <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
</head>
    
<body>
<!-- The First row -----------------------The First row----------------------------The First row--------------------->
<div class=\"container-fluid\">
	<div class=\"row\">
		<div class=\"col-sm-6\" style=\"background-color:white;\">    <!--First column-->       
            <br>
            <p>
    
";
    
    $body_clmn1 = "
			    
            </p>
		</div>
";
    $body_clmn2 = "
    		<div class=\"col-sm-6\" style=\"background-color:white;\">
            <br>
            <button type=\"button\" onClick=\"refreshPage()\">Update</button>
		</div>
	</div>
</div>
    <script>
        function refreshPage(){
            window.location.reload();
        } 
    </script>
</body>
</html>
";
    require_once 'phplot-6.2.0/phplot.php';
    //Create data arrays ---------------------------------------------------------------
    $DateAndTime = array();
    $IRAVEarray = array();
    $RoomTemparray = array();
    $EBTarray = array();
    $MotionArrey = array();
    $Dist = array();
    $sqltime = array ();
    $data = array();
    //---------------------------------------------------------------------------------
    $ID = $_SESSION['MAC']; //Get session ID
    $i = 0;
    //SQL -----------------------------------------------------------------------------
    $servername = "cnktechlabscom.ipowermysql.com";
    $username = "romanchak";
    $password = "ipwpxno";
    $dbname = "controllall";
    $conn = new mysqli($servername, $username, $password, $dbname);	// Create connection    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);			// Check connection
    }
    $result = mysqli_query($conn,"SELECT * FROM controllall" . " WHERE ms = " . $ID);
    //$result = mysqli_query($conn,"SELECT * FROM controllall");//read all the data from the SQL
    while($row = mysqli_fetch_array($result))
    {               
        //$LED = $row['BLE'];
        $EBT = $row['base'];//EBT
        $mean_SNSR1 = $row['sample'];
        $IR1 = $row['IR1'];
        $IR2 = $row['IR2'];
        $IR3 = $row['IR3'];
        $IR4 = $row['IR4'];
        $time = $row['time'];   //Date and Time from SQL
        $RoomT = $row['RoomT']; //Temp
        $motion = $row['temp'];//Motion sensor1
        $IRAVE = ($IR1 + $IR2 + $IR3 + $IR4)/4; 
        //Load Arrays with data ----------------------------------------------------
        $DateAndTime[$i] = $time;       //load date and time array
        $IRAVEarray[$i] = $IRAVE;       //load IRAVE array
        $RoomTemparray[$i] = $RoomT;
        $EBTarray[$i] = $EBT;
        $MotionArrey[$i] = $motion;
        $Dist[$i] = $mean_SNSR1;       //y-Array
        //$x[i] = $i;                  //x-Array
        //$data[] = array('', $i, $mean_SNSR1);
        //echo " Array Data: " . $DateAndTime[i] . "  IRAVE = " . $IRAVEarray[i] . " RT = " . $RoomTemparray[i];
        explode(" ",$time);//Split date and time string with space:   Tue, 16 Jun 2020 14:50:22 -0700
        $sqltime[$i] = $time[0] . $time[1] . $time[2];//x-axis, SQL time array
        $i++;
    } 
    mysqli_close($conn); 
    //-------------------------------------------------------------------------------  
    date_default_timezone_set('America/Los_Angeles');//Get the current date
    $d_and_t = date(DATE_RFC2822); // Current date and time	
    explode(" ",$d_and_t);//Split date and time string with space:   Tue, 16 Jun 2020 14:50:22 -0700
    $current_date_month = $d_and_t[5] . $d_and_t[6] . $d_and_t[7] . $d_and_t[8] . $d_and_t[9] . $d_and_t[10];//16 Jun
    echo "<br>";
    //echo "<div id=\"dialog-window\">";
    //echo "<div id=\"scrollable-content\">";
    $flag1 = 0;
    $flag2 = 0;
    $AIfile = fopen("ai.html", "w") or die("Unable to open file!"); //Open ai.html
    fwrite($AIfile, $header);//Write $header (defined above) to ai.html
    fclose($AIfile);//Close ai.html
    $AIfile = fopen("ai.html", "a");    
    for ($cntr = 0; $cntr < $i; $cntr++){//$i is the number of elements in the SQL table
        //The goal is to come up with a text that will say that there was movement today       
        $date_month = $DateAndTime[$cntr];//Get date and time from the SQL table
        explode(" ",$date_month);
        $date_month_arry = $date_month[5] . $date_month[6] . $date_month[7] . $date_month[8] . $date_month[9] . $date_month[10];//Current date and time
        //echo " " . $date_month_arry . " ";//OK
        if ($date_month_arry == $current_date_month){//If current date is found in SQL table 
            if ($MotionArrey[$cntr] == "X"){ //If motion is deteced 
                $AIcontent = " Motion Detected today " . $DateAndTime[$cntr] . " " . " Room Temperature: " . $RoomTemparray[$cntr] . $EBTarray[$cntr] . "<br>" . 
                " The object was at " . $Dist[$cntr] . " inch away from the sensor" . "<br>" . "<br>";//Data for AIfile (ai.html)               
                fwrite($AIfile, $AIcontent);//Write to file
                $flag2 ++;
            }                                                  
        }else{
            if ($flag1 == 0){//If current date is not in SQL
                $AIcontent = "The unit is turned off today - " . $d_and_t . "<br>";
                fwrite($AIfile, $AIcontent);
                $flag1 = 1;//To print once only
            }else{
                //none
            }
        }
    }
    if (($flag2 == 0) and ($flag1 == 0)){
        $AIcontent = "No Motion Detected <br>";
        fwrite($AIfile, $AIcontent);
    }
    fwrite($AIfile, $body_clmn1);//Write to file column1 
    
    //Txt for the 2nd column     
    if ($flag2 !=0){//Motion is detected today
        $min_dist = min($Dist);
        $max_dist = max($Dist);
        //The motion was detedcted this many times
        $AIcontent = "<br><br> <b> Motion was detected " . $flag2 . " times today " . "Detected range from " . $min_dist . " inch to " . $max_dist . " inch" . "</b> <br>";
        
        fwrite($AIfile, $AIcontent);//Write to second column in ai.html
    }
    
    fwrite($AIfile, $body_clmn2);//Write to file
    fclose($AIfile);//Close ai.html
    /*
    $plot = new PHPlot(800, 600);
    $plot->SetImageBorderType('plain');
    
    $plot->SetPlotType('points');
    $plot->SetDataType('data-data');
    $plot->SetDataValues($data);
    
    # Main plot title:
    $plot->SetTitle('Scatterplot (points plot)');
    
    # Need to set area and ticks to get reasonable choices.
    $plot->SetPlotAreaWorld(-12, -12, 12, 12);
    $plot->SetXTickIncrement(2);
    $plot->SetYTickIncrement(2);
    
    # Move axes and ticks to 0,0, but turn off tick labels:
    $plot->SetXAxisPosition(0); # Is default
    $plot->SetYAxisPosition(0);
    $plot->SetXTickPos('xaxis');
    $plot->SetXTickLabelPos('none');
    $plot->SetYTickPos('yaxis');
    $plot->SetYTickLabelPos('none');
    
    # Turn on 4 sided borders, now that axes are inside:
    $plot->SetPlotBorderType('full');
    
    # Draw both grids:
    $plot->SetDrawXGrid(True);
    $plot->SetDrawYGrid(True);  # Is default
    
    $plot->DrawGraph();
    */
    //echo "/div>";
    //echo "/div>";
}
?>
</body></html>