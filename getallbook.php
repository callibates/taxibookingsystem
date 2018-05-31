<?php
require_once("../../conf/settings.php"); //please make sure the path is correct
// complete your answer here
// ## 1. open the connection
// Connect to mysql server
$conn = @mysqli_connect($host, $user, $pswd, $dbnm)
or die('Failed to connect to server');

$db_select = @mysqli_select_db($conn, $dbnm)
or die('Database not available');

$query = "SELECT booknum, custname, phone, suburb, destination, pickupdate FROM requests WHERE status = 'unassigned' AND pickupdate < DATE_ADD(NOW(), INTERVAL 2 HOUR)";
$result = mysqli_query($conn, $query);


if(!$result){
    ECHO("There was an error retrieving this information from the database.");
}else {
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        ECHO("<h4>There are no currently unassigned bookings</h4>");
    } else {
        ECHO("<h5><strong>The following bookings are unassigned:</strong></h5>");
        ECHO("<table border=\"1\" class='mytable'>");
        ECHO("<tr>\n"
            . "<th scope=\"col\">Number</th>\n"
            . "<th scope=\"col\">Name</th>\n"
            . "<th scope=\"col\">Phone</th>\n"
            . "<th scope=\"col\">Suburb</th>\n"
            . "<th scope=\"col\">Destination</th>\n"
            . "<th scope=\"col\">Pick-up Date/Time</th>\n"
            . "</tr>\n");
        // retrieve current record pointed by the result pointer
        // Note the = is used to assign the record value to variable $row, this is not an error
        // the ($row = mysqli_fetch_assoc($result)) operation results to false if no record was retrieved
        // _assoc is used instead of _row, so field name can be used
        while ($row = mysqli_fetch_assoc($result)) {
            ECHO("<tr>");
            echo "<td>", $row["booknum"], "</td>";
            echo "<td>", $row["custname"], "</td>";
            echo "<td>", $row["phone"], "</td>";
            echo "<td>", $row["suburb"], "</td>";
            echo "<td>", $row["destination"], "</td>";
            echo "<td>", $row["pickupdate"], "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

}

// Frees up the memory, after using the result pointer
mysqli_free_result($result);
// ## 3. close the connection
mysqli_close($conn);
