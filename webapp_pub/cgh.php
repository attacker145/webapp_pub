<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CGH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
</head>
<body>

<div class="container-fluid">
  <h1> <font color="red"> CGH WebApp </font></h1>
  	<br>
	<br>
	<div class="row">					
		<div class="col-sm-3" style="background-color:white;">			
			<form action="" method="post">								
				<!--  <label for="TN">Enter Table Name (default "controllall")</label>							
				<input type="text" class="form-control" id="TN" name="tablename" value="controllall" />
				<br>-->
				<label for="MAC">Enter ID number</label>			
				<input type="text" class="form-control" id="MAC" name="MAC" value=" " />
				
				<button type="submit" class="btn btn-primary">View Data</button>								
			</form>
		</div>
		<div class="col-sm-3" style="background-color:white;">			
			<form action="" method="post">				
				<!--  <label for="TN">Enter Table Name (default "controllall")</label>			
				<input type="text" class="form-control" id="TN" name="cleardata" value="controllall" />
								<br>-->
				<label for="MACdel" style="color:blue;">Current ID number</label>		
				<input type="text" class="form-control" id="MACdel" name="MACdel" value=" " />
				
				<button type="submit" class="btn btn-primary">Clear Page</button>
			</form>
		</div>	
		<div class="col-sm-3" style="background-color:white;">
    		<form action="" method="post">			
				<label for="key" style="color:blue;">Enter Key</label>			
				<input type="text" class="form-control" id="key" name="key" value=" " />
    			<button type="submit" class="btn btn-primary">Enter</button>       					
    		</form>    
    	</div> 
	</div>
		
	<br>
	<div class="row">
    	<div class="col-sm-3" style="background-color:white;">
    		<form action="" method="post">
    			<!--  <label for="TN">Enter Message Board Name (The default is "CC3200command.php")</label>			
				<input type="text" class="form-control" id="MB" name="ledon" value="CC3200command.php" />-->
				<label for="MACledon" style="color:blue;">Current ID number</label>		
				<input type="text" class="form-control" id="MACledon" name="MACledon" value=" " />
    			<button type="submit" class="btn btn-primary">UV EN</button>       					
    		</form>    		   
    	</div>
    	<div class="col-sm-3" style="background-color:white;">
    		<form action="" method="post">
    			<!--  <label for="TN">Enter Message Board Name (The default is "CC3200command.php")</label>			
				<input type="text" class="form-control" id="MB" name="ledoff" value="CC3200command.php" />-->
				<label for="MACledoff" style="color:blue;">Current ID number</label>			
				<input type="text" class="form-control" id="MACledoff" name="MACledoff" value=" " />
    			<button type="submit" class="btn btn-primary">UV DIS</button>       					
    		</form>    
    	</div>  
    	<div class="col-sm-3" style="background-color:white;">
    		<form action="" method="post">
    			<label for="ID1">Enter ID number</label>			
				<input type="text" class="form-control" id="MAC" name="MAC" value=" " />	
				<br>																												
				<button type="submit" class="btn btn-primary" id="reset" name="reset">Reset</button> <!-- Reset Button -->		
				<button type="submit" class="btn btn-primary" id="AI" name="AI">Analyze</button>
				<a href="ai.html" target="_blank">View Analysis Result</a>														
			</form>   
		</div>	   	
<!--    <div class="col-sm-6" style="background-color:white;">
    		<label for="LED"><b>LED</b></label>
			<p class="text-left" id = "LED"> </p>
		</div>
 -->	
	</div>
	<br>		 	
	<div class="row">
    	<br>
    	<div class="col-sm-6" style="background-color:white;">
			<p> <em>Download data as a CSV file: <a href="cgh-data.csv" download> Download Data</a></em>  </p>  			
			<a href= "dataplot.jpg">
			<img border=1 name=img10 src="dataplot.jpg" hspace="0" 
			style="border:4px solid green; width:100%; max-width:500px;"></a>
		</div>
	</div>
	<br>

</div>
<br>
<script>
//<input id="foo" />
//<input id="bar" />

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

if(isset($_REQUEST['AI'])){
    include 'CGHAI.php';
    $ID = $_POST['MAC'];//Get the uniques ID
    $_SESSION['mac'] = $ID;
    //echo $ID; OK
    readSQL();//Function inside AI.php
}

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
//Display link to the CGH SQL CNTRL
if(isset($_REQUEST['key'])){
    $key = $_POST['key'];//Key value
    if ($key == "12345"){
        echo "<a href=\"CGH_sqlcntrl.php\" target=\"_blank\"> Link </a>" ;
    }else{
        echo "Wrong key";
    }
    
}
//Assign received data. The data is received from CC3200 serial string
if(isset($_REQUEST['redledon'])){
    $redledon = htmlspecialchars($_POST['redledon']);//start/stop $mac = $_POST['MAC'];//MAC $redledon.$mac
    $macledon = htmlspecialchars($_POST['MACledon']);//MAC
    $message_led_on = $redledon.$macledon;
    if ($redledon == "redledon"){
        $myfile = fopen("CC3200command.php", "w")or die("Unable to open file!");
        //fwrite($myfile, $redledon);//write "start" to CC3200command.html
        fwrite($myfile, $message_led_on);//write "start" to CC3200command.html
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
        fwrite($myfile, $message_led_off);//write "LED OFF" to CC3200command.html
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
    $tablename = "CGH";
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

if(isset($_REQUEST['MAC'])){
    
    //$tablename = $_REQUEST['tablename'];
    $tablename = "CGH";
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
    
    $clmn1 = "Stall";
    echo "
        <div style=\"overflow-x:auto;\">
        <table id=\"empTable\" class=\"table table-striped\">
        <thead>
        <tr>
		<th id=\"IR1\">" . $clmn1 . "</th>
        <th>Room T (<sup>O</sup>C)</th>
        <th>Column#8</th>
        <th>Device Name</th>
        <th>Date and Time</th>
        <th>UV</th>
        <th>ID</th>
		</tr>
        </thead>";
    echo "<tbody>";
    $myfile = fopen("cgh-data.csv", "w") or die("Unable to open file!");
    while($row = mysqli_fetch_array($result))
    {        
        echo "<tr>";
        echo "<td>" . $row['IR1'] . "</td>";
        echo "<td>" . $row['RoomT'] . "</td>";
        echo "<td>" . $row['base'] . "</td>";
        echo "<td>" . $row['sample'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['BLE'] . "</td>";//LED        
        echo "<td>" . $row['ms'] . "</td>";
        echo "</tr>";
        
        $LED = $row['BLE'];
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
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('America/Los_Angeles');

echo "</br>"."</br>".date(DATE_RFC2822);
?>
<br>

<script>
	var ledstat = "<?php echo $LED ?>";
	//document.getElementById("LED").innerHTML = ledstat.substr(0, 2);//var res = ledstat.substr(0, 1);
	var status = ledstat.substr(0, 2);
	if (status == 'ON'){
		document.getElementById("LED").innerHTML = '<img src="on.jpg">';
	}else{
		document.getElementById("LED").innerHTML = '<img src="off.jpg">';
	}

	//var x = document.getElementById("IR1_new").value;
	//document.getElementById("IR1").value = x;	
</script>  
</body>
</html>