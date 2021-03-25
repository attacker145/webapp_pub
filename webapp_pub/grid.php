<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>WebApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="http, client, cloud application, microchip, code, examples, Voltage, current, resistance, development kit, multimeter, usb, o-scope, electronics, hardware, softrware, opamp, operational, amplifier, adder, simulation,Test, measurement, electronics">
  <meta name="keywords" content="CC3200, web, application, HTTP, code, examples, Voltage, current, resistance, development kit, multimeter, usb, o-scope, electronics, hardware, softrware, opamp, operational, amplifier, adder, simulation, tina"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51750139-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.html"><b>CNK TECH LABs</b></a>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
    
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">WebApp</a></li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="../index.html">Home<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Detailed_Description.html">Details</a></li>
            <li><a href="../DigitalSniffer.html">Digital Sniffer</a></li>
          </ul>
        </li>
        
        <li><a href="../contactUs.html">Contact</a></li>        
        <li><a href="../aboutUs.html">About</a></li>
        
        <li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="../CoolProjects.html">Cool Projects<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="../CoolProjects.html">Cool Projects</a></li>
            		<li><a href="../temperature.html">Temperature</a></li>
            		<li><a href="https://hackaday.io/projects">Hackaday</a></li>           
          		</ul> 
        </li>  
        <li><a href="../CC3200.html">WiFi</a></li> 
        
        <li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="../NRF51822.html">BLE<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="../NRF51822.html">NRF51822</a></li>            		           
          		</ul> 
        </li> 
                
        <li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="../MSP430.html">MSP430<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="../MSP430.html">MSP430</a></li>
            		<li><a href="../MSP430code.html">Code Examples</a></li>            		          
          		</ul> 
       </li> 
          	
       <li><a href="../Services.html">Develop</a></li>   	
       <li><a href="../Blog.html">Blog</a></li> 
      </ul>
                                    
      <ul class="nav navbar-nav">      	
      		<li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="../CoolProjects.html">Basics<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="../math.html">Math</a></li>
            		<li><a href="../WhatCanWeLearn.html">Basics</a></li>
            		<li><a href="../ComparatorDesign.html">Comparator</a></li>    
            		<li><a href="../calculators.html">Calculators</a></li>       
          		</ul> 
          	</li>      		
      </ul>
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../SignUp.html"><span class="glyphicon glyphicon-user"></span> Groups</a></li>
        <li><a href="../LogIn.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">	
<!-- The Fourth row -----------------------The First row----------------------------The First row--------------------->	
	<br>
	<div class="row">
    	<div class="col-sm-3" style="background-color:white;"> <!-- 1ST columnt -->
<!--        <b>The last data received:</b> ==================================================================================== -->  		
      		<p id="demo"></p>	
    		<div id="sick"> </div>                          <!-- Sick/healsy image -->  
    		<br>	
    		<p>Time since the last datapoint:</p>
    		<p id="time2" style="font-size:180%;"></p>		<!-- Time since the last datapoint: -->    			
    	</div>
    	<div class="col-sm-3" style="background-color:white;">  <!-- 2ND columnt -->  		   		
    		<div id="mov"> </div>                           <!-- Motion detected image -->
    		<br>
    		<p id="dist" style="font-size:120%;"></p>		<!-- The object is at: wait inch status -->
    		<p id="roomT" style="font-size:120%;"></p>		<!-- Room Temperature status -->
    		<p id="dandt" style="font-size:120%;"></p>		<!-- Time stamp:  -->
			<p id="LED" style="font-size:120%;"></p>		<!-- UV light status:  -->
			<p id="IDdisplay" style="font-size:120%;"></p>	<!-- Display ID  -->
    		<form action="" method="post">
    			<label for="ID1">Enter ID number</label>			
				<input type="text" class="form-control" id="MAC" name="MAC" value=" " />	
				<br>																												
				<button type="submit" class="btn btn-primary" id="reset" name="reset">Reset</button> <!-- Reset Button -->		
				<button type="submit" class="btn btn-primary" id="AI" name="AI">Analyze</button>
				<a href="ai.html" target="_blank">View Analysis Result</a>										
			</form> 
			
<?php 
if(isset($_REQUEST['AI'])){
    include 'AI.php';
    $ID = $_POST['MAC'];//Get the uniques ID
    $_SESSION['mac'] = $ID;
    //echo $ID; OK
    readSQL();//Function inside AI.php
}
?>  		
    	</div>   	
    	<div class="col-sm-6" style="background-color:white;">
			<p> <em>Download data as a CSV file: <a href="data.csv" download> Download Data</a></em>  </p>  			
				<a href= "dataplot.jpg">
				<img border=1 name=img10 src="dataplot.jpg" hspace="0" 
				style="border:4px solid green; width:100%; max-width:400px;"></a>			
    	</div>	
    </div>
	<br><br>
<!-- The First row -----------------------The Second row----------------------------The Second row--------------------->
	<div class="row">					
		<div class="col-sm-3" style="background-color:white;">			
			<form action="" method="post">								
				<label for="MAC">Enter ID number to view data</label>			
				<input type="text" class="form-control" id="MAC" name="MAC" value=" " />
				
				<button type="submit" class="btn btn-primary">View Data</button>								
			</form>
		</div>
		<div class="col-sm-3" style="background-color:white;">			
			<form action="" method="post">				
				<!--  <label for="TN">Enter Table Name (default "controllall")</label>			
				<input type="text" class="form-control" id="TN" name="cleardata" value="controllall" />
								<br>-->
				<label for="MACdel" style="color:black;">Enter ID number to delete data</label>		
				<input type="text" class="form-control" id="MACdel" name="MACdel" value=" " />
				
				<button type="submit" class="btn btn-primary">Delete Data</button>
			</form>
		</div>
		<div class="col-sm-6" style="background-color:white;">	
			<br>					
			<p>To view EBT sample data enter ID: <em>95378810207688</em></p>
		</div>	
	</div>
<!-- The Second row -----------------------The Third row----------------------------The Third row--------------------->		
	<br>
	<div class="row">
    	<div class="col-sm-3" style="background-color:white;">
    		<form action="" method="post">
    			<!--  <label for="TN">Enter Message Board Name (The default is "CC3200command.php")</label>			
				<input type="text" class="form-control" id="MB" name="ledon" value="CC3200command.php" />-->
				<label for="MACledon" style="color:blue;">Current ID number</label>		
				<input type="text" class="form-control" id="MACledon" name="MACledon" value=" " />
    			<button type="submit" class="btn btn-primary">UVC ON</button>       					
    		</form>    		   
    	</div>
    	<div class="col-sm-3" style="background-color:white;">
    		<form action="" method="post">
    			<!--  <label for="TN">Enter Message Board Name (The default is "CC3200command.php")</label>			
				<input type="text" class="form-control" id="MB" name="ledoff" value="CC3200command.php" />-->
				<label for="MACledoff" style="color:blue;">Current ID number</label>			
				<input type="text" class="form-control" id="MACledoff" name="MACledoff" value=" " />
    			<button type="submit" class="btn btn-primary">UVC OFF</button>       					
    		</form>    
    	</div> 
    	<div class="col-sm-6" style="background-color:white;">   	
			<p>
				<em>The EBT project web-page:</em>
				<a href= "https://hackaday.io/project/170728-elevated-body-temperature-detector-cloud-enabled" target = "blank">https://hackaday.io/project/170728-elevated-body-temperature-detector-cloud-enabled</a>
			</p>
			<p>
				<em>The HTTP Client project web-page:</em>
				<a href= "http://cnktechlabs.com/CC3200/http-client.html" target = "blank">http://cnktechlabs.com/CC3200/http-client.html</a>
			</p>
		</div>
	</div>
<!-- The Third row -----------------------The 4th row----------------------------The 4th row--------------------->
	<br>		 
	<div class="row">	
		<div class="col-sm-3" style="background-color:white;">
			<input type="text" class="form-control" id="newID" name="newID" value=" " />			
			<form action="" method="post">																															
				<button type="submit" class="btn btn-primary" id="ID" name="ID">Get a Unique ID</button>								
			</form>						
		</div>
		<div class="col-sm-3" style="background-color:white;">			
			<input type="text" class="form-control" id="newIDhex" name="newIDhex" value=" " />
			<label for="newIDhex" style="color:black;">ID HEX Value</label>
		</div>
		<div class="col-sm-6" style="background-color:white;">			
			<h4>POST your data here. No Sign In is required</h4>	
			<h4><a href="how-to-post.html" target = "blank">How to POST data to this WebApp</a></h4>		 
		</div>															
	</div> 	
	
	
</div>
<br>
<script>
var $MAC_ = $("#MAC");
var $MACdel_ = $("#MACdel");
var $MACledon_ = $("#MACledon");
var $MACledoff_ = $("#MACledoff");

$MAC_.on("keydown",function(){
   setTimeout(checkValue,0); 
});

var v2 = $MACdel_.val();
var v3 = $MACledon_.val();
var v4 = $MACledoff_.val();

var checkValue = function(){
    var v1 = $MAC_.val();   
    if (v1 != v2){
        $MACdel_.val(v1);
        v2 = v1;
    }
    var v1 = $MAC_.val();   
    if (v1 != v3){
    	$MACledon_.val(v1);
        v3 = v1;
    } 
    var v1 = $MAC_.val();   
    if (v1 != v4){
    	$MACledoff_.val(v1);
        v4 = v1;
    }   
};


$(document).ready(function(){
    $('form').FormCache();
});
(function ( $ ) {
    $.fn.FormCache = function( options ) {
        var settings = $.extend({
        }, options );
        
        function on_change(event) {
            var input = $(event.target);
            var key = input.parents('form:first').attr('name');
            var data = JSON.parse(localStorage[key]);
            
            if(input.attr('type') == 'radio' || input.attr('type') == 'checkbox') {
                data[input.attr('name')] = input.is(':checked');
            }else {
                data[input.attr('name')] = input.val();
            }
            
            localStorage[key] = JSON.stringify(data);
        }
        
        return this.each(function() {    
            var element = $(this);
            
            if(typeof(Storage)!=="undefined"){
                var key = element.attr('name');
                
                var data = false;
                if(localStorage[key]) {
                    data = JSON.parse(localStorage[key]);
                }
                
                if(!data) {
                    localStorage[key] = JSON.stringify({});
                    data = JSON.parse(localStorage[key]);
                }
                element.find('input, select').change(on_change);
                
                element.find('input, select').each(function(){
                    if($(this).attr('type') != 'submit') {
                        var input = $(this);
                        var value = data[input.attr('name')];
                        if(input.attr('type') == 'radio' || input.attr('type') == 'checkbox') {
                            if(value) {
                                input.attr('checked', input.is(':checked'));
                            } else {
                                input.removeAttr('checked');
                            }
                        } else {
                            input.val(value);
                        }
                    }
                });                                
            }
            else {
                alert('local storage is not available');
            }
        });
    };     
}( jQuery ))
</script>
<?php
//$BLE = $_GET['LEDstat'];
//echo "LED is: ".$BLE."<br>";

if(isset($_REQUEST['crtable'])){    
    $tablename = $_REQUEST['crtable'];//Get table name echo "</br>"
    //echo $tablename;    
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
    // sql to create table
    $sql = "CREATE TABLE ".$tablename."(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    IR1 VARCHAR(50) NOT NULL,
    IR2 VARCHAR(50) NOT NULL,
    IR3 VARCHAR(50) NOT NULL,
    IR4 VARCHAR(50) NOT NULL,
    temp VARCHAR(50) NOT NULL,
    light VARCHAR(50) NOT NULL,
    RoomT VARCHAR(50) NOT NULL,
    base VARCHAR(50) NOT NULL,
    sample VARCHAR(50) NOT NULL,
    time VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>" . "Table ".$tablename. " created successfully" . "</p>";
    } else {
        echo "<p>" . "Error creating table: " . $conn->error . "</p>";
    }    
    $conn->close();
}

//Assign received data. The data is received from CC3200 serial string
if(isset($_REQUEST['redledon'])){
    $redledon = htmlspecialchars($_POST['redledon']);//start/stop $mac = $_POST['MAC'];//MAC $redledon.$mac
    $macledon = htmlspecialchars($_POST['MACledon']);//MAC
    $message_led_on = $redledon.$macledon;//Message written to CC3200command.php
    if ($redledon == "redledon"){
        $myfile = fopen("CC3200command.php", "w")or die("Unable to open file!");
        //fwrite($myfile, $redledon);//write "start" to CC3200command.html
        fwrite($myfile, $message_led_on);//write "redledon MACledon" to CC3200command.html
        fclose($myfile);
    }
    echo "</br>"."&nbsp;"."Command sent: ".$message_led_on;
}
if(isset($_REQUEST['redledoff'])){
    $redledoff = htmlspecialchars($_POST['redledoff']);//start/stop    
    $macledoff = htmlspecialchars($_POST['MACledoff']);//MAC
    $message_led_off = $redledoff.$macledoff;
    if ($redledoff == "redledoff"){
        $myfile = fopen("CC3200command.php", "w")or die("Unable to open file!");
        //fwrite($myfile, $redledoff);//write "start" to CC3200command.html
        fwrite($myfile, $message_led_off);//write "start" to CC3200command.html
        fclose($myfile);
    }
    echo "</br>"."&nbsp;"."Command sent: ".$message_led_off;
}
if(isset($_REQUEST['MACledon'])){
    //$filename = htmlspecialchars($_POST['ledon']);//Get filename: value="CC3200command.php"
    $filename = "CC3200command.php";
    $macledon = htmlspecialchars($_POST['MACledon']);//MAC
    $message_led_on = "redledon".$macledon;
    $myfile = fopen($filename, "w")or die("Unable to open file!");
    fwrite($myfile, $message_led_on);//write "redledon"
    fclose($myfile);
    echo "</br>"."&nbsp;"."Command sent: ".$message_led_on;
}
if(isset($_REQUEST['MACledoff'])){
    //$filename = htmlspecialchars($_POST['ledoff']);//Get filename: value="CC3200command.php"
    $filename = "CC3200command.php";
    $macledoff = htmlspecialchars($_POST['MACledoff']);//MAC
    $message_led_off = "redledoff".$macledoff;
    $myfile = fopen($filename, "w")or die("Unable to open file!");
    fwrite($myfile, $message_led_off);//write "redledoff"
    fclose($myfile);
    echo "</br>"."&nbsp;"."Command sent: ".$message_led_off;
}
echo "</br> </br>";

//Delete data
if(isset($_REQUEST['MACdel'])){    
    
    //$tablename = $_POST['cleardata'];
    $tablename = "controllall";
    $mac = $_POST['MACdel'];//MAC
    //echo $tablename;
    //echo ":";
    $servername = "cnktechlabscom.ipowermysql.com";
    $username = "romanchak";
    $password = "ipwpxno";
    $dbname = "controllall";
        
    $conn = new mysqli($servername, $username, $password, $dbname);// Create connection    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);// Check connection
    } 
    //$sql = "DELETE FROM " .$tablename;
    $sql = "DELETE FROM " . $tablename. " WHERE ms = " . $mac;
    if ($conn->query($sql) === TRUE) {
        echo " Records deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    mysqli_close($conn);    
}

if(isset($_REQUEST['MAC'])){//Read and display the sql table
    
    //$tablename = $_REQUEST['tablename'];
    $tablename = "controllall";
    $mac = $_POST['MAC'];//MAC
    //$mac = '537067452';
    //Read data saved in sql table
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

    //$result = mysqli_query($conn,"SELECT * FROM " .$tablename);
    $result = mysqli_query($conn,"SELECT * FROM " . $tablename . " WHERE ms = " . $mac);  
    
    $clmn1 = "IR1";
    $clmn2 = "IR2";
    $clmn3 = "IR3";
    $clmn4 = "IR4";
    $clmn5 = "Motion";
    $clmn6 = "Motion";
    $clmn7 = "Room Temperature";
    echo "
        <div style=\"overflow-x:auto;\">
        <table id=\"empTable\" class=\"table table-striped\">
        <thead>
        <tr>
		<th id=\"IR1\">"   . $clmn1 . "</th>
		<th id=\"IR2\">"   . $clmn2 . "</th>
        <th id=\"IR3\">"   . $clmn3 . "</th>
        <th id=\"IR4\">"   . $clmn4 . "</th>
        <th id=\"clmn5\">" . $clmn5 . "</th>
        <th id=\"clmn6\">" . $clmn6 . "</th>
        <th id=\"clmn7\">" . $clmn7 . "</th>
        <th>EBT</th>
        <th>Dist (inch)</th>
        <th>Date and Time</th>
        <th>UVC</th>
        <th>ID</th>
		</tr>
        </thead>";
    echo "<tbody>";
    $myfile = fopen("data.csv", "w") or die("Unable to open file!");
    while($row = mysqli_fetch_array($result))
    {        
        echo "<tr>";
        echo "<td>" . $row['IR1'] . "</td>";
        echo "<td>" . $row['IR2'] . "</td>";
        echo "<td>" . $row['IR3'] . "</td>";
        echo "<td>" . $row['IR4'] . "</td>";
        echo "<td>" . $row['temp'] . "</td>";
        echo "<td>" . $row['light'] . "</td>";
        echo "<td>" . $row['RoomT'] . "</td>";
        echo "<td>" . $row['base'] . "</td>";
        echo "<td>" . $row['sample'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['BLE'] . "</td>";//LED        
        echo "<td>" . $row['ms'] . "</td>";
        echo "</tr>";
        
        $LED = $row['BLE'];
        $EBT = $row['base'];
        $IR1 = $row['IR1'];
        $IR2 = $row['IR2'];
        $IR3 = $row['IR3'];
        $IR4 = $row['IR4'];
        $time = $row['time'];
        $RoomT = $row['RoomT'];
        $thermal = "$IR1, $IR2, $IR3, $IR4, $RoomT, $time \n";   
        $content .= $thermal;        
    }    
    echo "</tbody>";
    echo "</table>"; 
    echo "</div>";
    //file_put_contents($myfile, $content);
    fwrite($myfile, $content);
    //echo "<br>" . "<a href = newfile.txt>File</a>";
    fclose($myfile);
    mysqli_close($conn);
}

if(isset($_REQUEST['ID'])){
    $tablename = "controllall";
    $newID = $_POST['newID'];//MAC
    //Read data saved in sql table
    $servername = "cnktechlabscom.ipowermysql.com";
    $username = "romanchak";
    $password = "ipwpxno";
    $dbname = "controllall";
    
    $conn = new mysqli($servername, $username, $password, $dbname);// Create connection
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $newID = 0;
    $result = mysqli_query($conn,"SELECT * FROM " .$tablename);	//get all data
    
    while($newID == 0){
        $newID = rand(10000000000001,99999999999999);//random ID
            while($row = mysqli_fetch_array($result))
            {        
                $ID_in_use = $row['ms'];//get all IDs
                if ($ID_in_use == $newID ){           
                    $newID = 0;//If current ID exists, reset ID
                }        
            }
    }
    $newIDa = $newID;
    echo "<br>" . "&nbsp;" . "&nbsp;" . " ID: " . "<b>" . $newID . "</b>";//Print the new ID number
    // init hex array
    $hex = array();
    while ($newIDa)
    {
        // get modulus // based on docs both params are string
        $modulus = bcmod($newIDa, '16');
        // convert to hex and prepend to array
        array_unshift($hex, dechex($modulus));
        // update decimal number
        $newIDa = bcdiv(bcsub($newIDa, $modulus), 16);
    }
    // array elements to string
    echo "</br>" . "&nbsp;" . "&nbsp;" . " ID: " . "<b>" . "<b>" . implode('', $hex) . "</b>";
    echo "</br>";
    mysqli_close($conn);
}



// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('America/Los_Angeles');

echo "</br>"."</br>".date(DATE_RFC2822);
?>
<br>
<script type="text/javascript">
	var newID = "<?php echo $newID ?>"; //
	document.getElementById("newID").value = newID;
	var newIDhex = "<?php echo implode('', $hex) ?>";
	document.getElementById("newIDhex").value = newIDhex.toUpperCase();
	//document.getElementById("newIDhex").value = newIDhex;//implode('', $hex)
</script>

<script>
	var ledstat = "<?php echo $LED ?>";
	//document.getElementById("LED").innerHTML = ledstat.substr(0, 2);//var res = ledstat.substr(0, 1);
	var status = ledstat.substr(0, 2);
	if (status == 'ON'){
		//document.getElementById("LED").innerHTML = '<img src="on.jpg">';
		//document.getElementById("LED").innerHTML = "UVC ON";
	}else{
		//document.getElementById("LED").innerHTML = '<img src="off.jpg">';
		//document.getElementById("LED").innerHTML = "UVC OFF";
	}

	//var x = document.getElementById("IR1_new").value;
	//document.getElementById("IR1").value = x;	
</script>
 
<script>
	//var ebt= "<?php //echo $EBT ?>";
	//document.getElementById("LED").innerHTML = ledstat.substr(0, 2);//var res = ledstat.substr(0, 1);
	//var status = ebt.substr(0, 3);
	//if (status == 'EBT'){
		//document.getElementById("sick").innerHTML = '<img src="sick.jpg">';
	//}else{
		//document.getElementById("sick").innerHTML = '<img src="nsick.jpg">';
	//}

	//var x = document.getElementById("IR1_new").value;
	//document.getElementById("IR1").value = x;	
</script> 

<script> 
function loadDoc() {	
	var n = 0;	
	var ebt = 0;
	var wait = 0;
	var mov = 0;
	var UVC = 0;
	var reset = 0;
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
        	<?php $ID = $_POST['MAC']?>
    		var ID = <?php echo $ID ?>;	//Get current ID number from grid.php
    		//var ID = document.getElementById("MAC").value;//Get current ID number from grid.php
    		document.getElementById("IDdisplay").value = ID;
    		var file = this.responseText;	//Get xml.txt text. ID is in the file
    		n = file.search(ID);			//Find ID number in xml.txt
    		//document.getElementById("demo1").innerHTML = n;
    		if (n!=-1){						//If ID matches
      			document.getElementById("demo").innerHTML = this.responseText;//Get the last data line saved in xml.txt

    			ebt = file.search("EBT");
        		if (ebt!=-1){
        			document.getElementById("sick").innerHTML = '<img src="sick.jpg" style="width:100%; max-width:130px;">';//Get the last data line   			
        		}else{
        			wait = file.search("wait");
        			if (wait != -1){
        				document.getElementById("sick").innerHTML = '<img src="wait.jpg" style="width:100%; max-width:150px;">';
        			}else{
        				document.getElementById("sick").innerHTML = '<img src="nsick.jpg" style="width:100%; max-width:130px;">';
        			}
        		}

    			mov = file.search("X");
        		if (mov!=-1){
        			document.getElementById("mov").innerHTML = '<img src="moving.png" style="width:100%; max-width:300px;">';//Get the last data line   			
        		}else{
        			document.getElementById("mov").innerHTML = '<img src="still.jpg" style="width:100%; max-width:300px;">';
        		} 

    			UVC = file.search("ON");
        		if (UVC!=-1){
        			document.getElementById("LED").innerHTML = "UVC ON";   			
        		}else{
        			document.getElementById("LED").innerHTML = "UVC OFF";
        		}
        		var txt = this.responseText;	//   
        		var res = txt.split(" "); 
        		document.getElementById("dandt").innerHTML = 'Time stamp: ' + res[10] + ' ' + res[11] + ' ' + res[12] + ' ' + res[13];//Get the distance from dist.txt 	

        		//0 0 0 0 ON  Room Temperature:0.00    0 Fri, 14 Aug 2020 13:43:00 -0700 95378810207688	
        		reset = file.search("Room Temperature:0.00    0");	
        		if (reset != -1){
            		<?php 
            		$filename = "CC3200command-test.php";//Command file for read GET method in C code
            		$ID = $_POST['MAC'];
            		//$macledoff = htmlspecialchars($_POST['MACledoff']);//MAC didn't work
            		$message_led_off = "redledoff".$ID;//
            		$myfile = fopen($filename, "w")or die("Unable to open file!");
            		fwrite($myfile, $message_led_off);//write "redledoff"
            		fclose($myfile);
            		?>
        		}  			
    		}
    		
    	}
  	};
  	xhttp.open("POST", "xml.txt", true);
  	xhttp.send();
}
$(document).ready(function(){
	 setInterval(loadDoc,2000);
});
//Get distance from the dist.txt page
function getdist() {	
	var ID = 0;	
	var txt;
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    		var ID = "<?php echo $mac ?>";	//Get current ID number
    		var file = this.responseText;	//Get dist.txt text
    		ID = file.search(ID);			//Find ID number in xml.txt
    		if (ID!=-1){
        		txt = this.responseText;	//If ID matches						
    			var res = txt.split(" ");
      			//document.getElementById("dist").innerHTML = this.responseText;//Get the distance from dist.txt
      			document.getElementById("dist").innerHTML = 'The object is at: ' + res[0] + ' inch';//Get the distance from dist.txt        			  			
    		}
    		
    	}
  	};
  	xhttp.open("POST", "dist.txt", true);
  	xhttp.send();
}
$(document).ready(function(){
	 setInterval(getdist,2000);
});


//Display room temperature the temperature.txt page. This function checks ID
function gettemp() {	
	var ID = 0;	
	var txt;
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    		var ID = "<?php echo $mac ?>";	//Get current ID number
    		var file = this.responseText;	//Get temperature.txt text
    		ID = file.search(ID);			//Find ID number in temperature.txt
    		if (ID!=-1){					//Verify ID
        		txt = this.responseText;	//If ID matches						
    			var res = txt.split(" ");      			
      			document.getElementById("roomT").innerHTML = 'Room Temperature: ' + res[0] + ' C';//Get temperature from temperature.txt        			  			
    		}
    		
    	}
  	};
  	xhttp.open("POST", "temperature.txt", true);//Has currnt ID
  	xhttp.send();
}
$(document).ready(function(){
	 setInterval(gettemp,2000);
});

//Compare time. Show time lapse since the last datapoint was received
function readtime() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var file = this.responseText;	//Get time.txt text
			txt = this.responseText;
			var res = txt.split(" ");//Get time from time.txt, res[0] has the current time
			//get curent time
			var time = Date.now();//The number of milliseconds since midnight, January 1, 1970
			time = time /1000;    //The number of seconds since midnight, January 1, 1970
			//document.getElementById("time1").innerHTML = res[0];
			//document.getElementById("time2").innerHTML = time;	
			var time_diff = Math.abs(time - res[0]);//Find difference between the current time and time from time.txt
			time_diff = time_diff.toFixed(4);
			//Display the time differenc on the webpage	
			//document.getElementById("time2").innerHTML = 'Time since the last datapoint: ' + time_diff + ' sec';
			document.getElementById("time2").innerHTML = time_diff + ' sec';	
			if ((time_diff > 20.0) && (time_diff < 21.0)){//reload only once
				<?php
				    $ID = $_POST['MAC'];
				    $content = "wait - NO DATA for ID: " . $ID;
				    $myfile = fopen("xml.txt", "w") or die("Unable to open file!");
				    fwrite($myfile, $content);
				    fclose($myfile);
				    $myfile = fopen("dist.txt", "w") or die("Unable to open file!");
				    fwrite($myfile, $content);
				    fclose($myfile);
				?>
				location.reload();//Reload page only once
				//time_diff = 0;
			}
		}		
	}
  	xhttp.open("POST", "time.txt", true);
  	xhttp.send();	
}	
$(document).ready(function(){
	 setInterval(readtime,1000);
});
</script>

<script>
	var headerfile = "<?php echo fread($headerfile,filesize("header.txt"))?>";
    <?php fclose($headerfile); ?>
	document.getElementById("header").innerHTML = headerfile;
</script>
<?php 
if(isset($_REQUEST['reset'])){//Erase xml.txt and dist.txt
    $ID = $_POST['MAC'];
    $content = "wait - NO DATA for ID: " . $ID;
    $myfile = fopen("xml.txt", "r");
    if( strpos(file_get_contents("xml.txt"),$_POST['MAC']) !== FALSE) { //If ID is correct
        echo "ID OK";
    }
    //if( strpos(file_get_contents("xml.txt"),$_POST['MAC']) !== FALSE) {//Search xml.txt for current ID
        fclose($myfile);
        $myfile = fopen("xml.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);//Overwrite xml.txt with "wait - NO DATA for ID: "
        $myfile = fopen("dist.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);
   //}else{
        //$content = "Wrong ID";
        //fclose($myfile);
        //$myfile = fopen("xml.txt", "w") or die("Unable to open file!");
        //fwrite($myfile, $content);
        //fclose($myfile);
        //$myfile = fopen("dist.txt", "w") or die("Unable to open file!");
        //fwrite($myfile, $content);
        //fclose($myfile);
    //}

}

/*
function SQLoverload() {
    $servername = "cnktechlabscom.ipowermysql.com";
    $username = "romanchak";
    $password = "ipwpxno";
    $dbname = "controllall";
    $conn = new mysqli($servername, $username, $password, $dbname);	// Create connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);			// Check connection
    }
    $ID = $_POST['MAC'];
    $i = 0;
    $result = mysqli_query($conn,"SELECT * FROM controllall" . " WHERE ms = " . $ID);   
    while($row = mysqli_fetch_array($result))
    {
        $IR1 = $row['IR1'];
        $i++;
    }
    mysqli_close($conn);
    
    //If there are more than 500 records clear SQL=====================================
    if ($i>500){
        $mac = $_SESSION['mac']; //Get session ID
        $servername = "cnktechlabscom.ipowermysql.com";
        $username = "romanchak";
        $password = "ipwpxno";
        $dbname = "controllall";
        
        $conn = new mysqli($servername, $username, $password, $dbname);// Create connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);// Check connection
        }
        $sql = "DELETE FROM controllall WHERE ms = " . $mac;
        if ($conn->query($sql) === TRUE) {
            echo " Records deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        mysqli_close($conn);
    }
}

SQLoverload(); // call the function clear SQL table
*/
?>

</body>
</html>