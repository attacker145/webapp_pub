<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CGH SQL CNTRL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="http, client, cloud application, microchip, code, examples, Voltage, current, resistance, development kit, multimeter, usb, o-scope, electronics, hardware, softrware, opamp, operational, amplifier, adder, simulation,Test, measurement, electronics">
  <meta name="keywords" content="CC3200, web, application, HTTP, code, examples, Voltage, current, resistance, development kit, multimeter, usb, o-scope, electronics, hardware, softrware, opamp, operational, amplifier, adder, simulation, tina">
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

<div class="container-fluid">
  <h1>CGH SQL CNTRL</h1>
  	<br>
	<div class="row">					
		<div class="col-sm-3" style="background-color:white;">			
			<form action="" method="post">												
				<button type="submit" class="btn btn-primary" id="MAC" name="MAC" >View Data</button>								
			</form>
		</div>
		<div class="col-sm-3" style="background-color:white;">			
			<form action="" method="post">								
				<button type="submit" class="btn btn-primary" id="MACdel" name="MACdel">Clear Page</button>
			</form>
		</div>	
	</div>	
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
    $tablename = "CGH";
    //$mac = $_POST['MACdel'];//MAC
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
    $sql = "DELETE FROM " . $tablename;
    if ($conn->query($sql) === TRUE) {
        echo " Records deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    mysqli_close($conn);    
}

if(isset($_REQUEST['MAC'])){//Read and display the sql table
    
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
    $result = mysqli_query($conn,"SELECT * FROM " . $tablename);  
    
    $clmn1 = "IR1";
    $clmn2 = "IR2";
    $clmn3 = "IR3";
    $clmn4 = "IR4";
    $clmn5 = "Motion";
    $clmn6 = "Motion";
    $clmn7 = "Room T (<sup>O</sup>C)";
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
        <th>LED</th>
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


//Chart PHP
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
    // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=cnktechlabscom.ipowermysql.com;dbname=controllall;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
    'romanchak', //'root',
    'ipwpxno', //'',
    array(
    \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_PERSISTENT => false
    )
    );
    
    $handle = $link->prepare('select time, IR1 from controllall');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    
    foreach($result as $row){
        array_push($dataPoints, array("time"=> $row->x, "IR1"=> $row->y));
    }
    $link = null;
}
catch(\PDOException $ex){
    echo "</br>";
    print($ex->getMessage());
}
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