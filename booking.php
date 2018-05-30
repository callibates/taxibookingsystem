<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="xhr.js"></script>
    <script type="text/javascript" src="probook.js"></script>

    <title>Book</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="navbar-brand" href="index.html">Index</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="booking.php">Make A Booking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin.html">Admin</a>
        </li>
    </ul>
</nav>
<div class="container">
    </br></br>
    <h3>Book a Taxi!</h3>
    <form id="myForm" onsubmit="addBook('storebook.php'); return false;"> <!--When the submit button is clicked...-->
        <!--form action="processbooking.js" method="get"><!--When the submit button is clicked...-->
            <div class="form-group">
            </br>
            <label for="fname">First Name</label>
            <input type="fname" class="form-control" id="fname" name="fname" required="required" >
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="lname" class="form-control" id="lname" name="lname" required="required" >
        </div>
        <div class="form-group">
            <label for="phone">Contact Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" required="required"  placeholder="Numbers only please" >
        </div>
        <div class="form-group">
            <label for="unitnum">Unit Number</label>
            <input type="number" class="form-control" id="unitnum" name="unitnum"  placeholder="Numbers only please" >
        </div>
        <div class="form-group">
            <label for="streetnum">Street Number</label>
            <input type="number" class="form-control" id="streetnum" name="streetnum" required = "required"  placeholder="Numbers only please" >
        </div>
        <div class="form-group">
            <label for="streetname">Street Name</label>
            <input type="string" class="form-control" id="streetname" name="streetname" required = "required">
        </div>
        <div class="form-group">
            <label for="suburb">Suburb</label>
            <input type="string" class="form-control" id="suburb" name="suburb" required = "required">
        </div>
        <div class="form-group">
            <label for="destsuburb">Destination Suburb</label>
            <input type="string" class="form-control" id="destsuburb" name="destsuburb" required = "required">
        </div>
        <div class="form-group">
            <label for="pudate">Pick-Up Date</label>
            <input type="date" class="form-control" id="pudate" name="pudate" required = "required">
        </div>
        <div class="form-group">
            <label for="putime">Pick-Up Time</label>
            <?php
            $datey2 = date("h:i A");
            ?>
            <input type="time" class="form-control" id="putime" name="putime" required = "required" value=<?php echo $datey2; ?>>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    <div id="screwyouhtml">

    </div>
</div>
</body>
</html>