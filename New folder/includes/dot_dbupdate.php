<?php
$servername = "localhost";
$username = "root";
$password = "cookies";
$dbname = "povertyalleviatordb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$candle1 = $_GET['candle1'];
$candle5 = $_GET['candle5'];
$candle6 = $_GET['candle6'];
$dot1 = $_GET['dot1'];
$dot2 = $_GET['dot2'];
$dot3 = $_GET['dot3'];
$dot4 = $_GET['dot4'];
$dot5 = $_GET['dot5'];

$sql = "UPDATE tblsignals SET candle1='$candle1', candle5='$candle5', candle6='$candle6', dot1='$dot1', dot2='$dot2', dot3='$dot3', dot4='$dot4', dot5='$dot5' WHERE candle_id=1";

if ($conn->query($sql) === TRUE) {
    echo "sql executed successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>