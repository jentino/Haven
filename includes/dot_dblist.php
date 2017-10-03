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

$candleid = $_POST['candle_id'];

$sql = "SELECT $candleid FROM tblsignals";
$result = $conn->query($sql);

//echo "<script type='text/javascript'>alert('$candleid');</script>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "" . $row["$candleid"]. "";
    }
} else {
    echo "0 results";
}
$conn->close();
?>