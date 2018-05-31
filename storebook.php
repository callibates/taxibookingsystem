
<?php
//ID: 15905324
//This is the file for storing bookings
// get name and password passed from client
//$num = $_POST['num'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$sub = $_POST['sub'];
$dest = $_POST['dest'];
$pudate = $_POST['pudate'];
//$date = $_POST['date'];
$status = "unassigned";
$time = $_POST['putime'];
//$ctime = $_POST['ctime'];

$timedate = "";
$timedate = $timedate . $time;
$datetime = $_POST['datetime'];
$newtime = $_POST['thetime'];

$date = date("Y-m-d");
$ctime = date("H:i:sa");
$rand = rand(1,10000000);

$bignum = hexdec( substr(md5($rand), 0, 15) );
$smallernum = substr($bignum, 0, 8);
$num = $smallernum;


if(isset($name)) {
    require_once("../../conf/settings.php");
// ## 1. open the connection
// Connect to mysql server
    $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
    or die('Failed to connect to server');

    $db_select = @mysqli_select_db($conn, $dbnm)
    or die('Database not available');

    $query = "INSERT INTO requests(booknum, custname, phone, address, suburb, destination, pickupdate, currdate, currtime, status) VALUES ($num,'$name','$phone','$address','$sub','$dest', '$datetime','$date','$ctime', '$status')";
    $result = mysqli_query($conn, $query);

}
// Frees up the memory, after using the result pointer
mysqli_free_result($result);
// ## 3. close the connection
mysqli_close($conn);

ECHO ("Thank you! Your booking reference number is: $num. You will be picked up in front of your provided address on $pudate at $newtime.");
?>