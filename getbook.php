<?php
$num = $_POST['num'];

if(isset($num)) {
    require_once("../../conf/settings.php"); //please make sure the path is correct
// complete your answer here
// ## 1. open the connection
// Connect to mysql server
    $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
    or die('Failed to connect to server');

    $db_select = @mysqli_select_db($conn, $dbnm)
    or die('Database not available');

    $query = "SELECT booknum FROM requests WHERE booknum = $num";
    $result = mysqli_query($conn, $query);


    if(!$result){
        ECHO("There was an error retrieving this information from the database.");
    }else{
        $query2 = "UPDATE requests SET status= 'assigned' WHERE booknum = $num";
        $result = mysqli_query($conn, $query2);
        ECHO("The booking request $num has been properly assigned.");
    }

    // Frees up the memory, after using the result pointer
    mysqli_free_result($result);
// ## 3. close the connection
    mysqli_close($conn);

// write back the password concatenated to end of the name
}
