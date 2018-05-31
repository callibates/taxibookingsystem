<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="xhr.js"></script>
    <script type="text/javascript" src="probook.js"></script>

    <title>Book</title>
</head>
<body>
<!--nav class="navbar navbar-expand-sm bg-secondary navbar-dark"-->
<nav class="navbar navbar-expand-sm navbar-custom">
    <ul class="navbar-nav">
        <li class="nav-item">
            <h2 class="navbar-brand brand-name">
                <a href="index.html"><img class="img-responsive2"
                                          src="images/taxi.png"></a>
            </h2>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="item1" href="booking.php">Book</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="item2" href="admin.html">Admin</a>
        </li>
    </ul>
</nav>
<div class="container mydiv">
    </br></br>
    <h3>Book a Taxi!</h3>
    <div class="mydiv">
    <form id="myForm" onsubmit="addBook('storebook.php'); return false;"> <!--When the submit button is clicked...-->
            <div class="form-group">
            </br>
            <label for="fname">First Name</label>
            <input type="fname" class="form-control" id="fname" name="fname" required="required" value="John" >
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="lname" class="form-control" id="lname" name="lname" required="required" value = "Smith">
        </div>
        <div class="form-group">
            <label for="phone">Contact Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" required="required" value=022022022><!--could make dropdown-->
        </div>
        <div class="form-group">
            <label for="unitnum">Unit Number</label>
            <input type="number" class="form-control" id="unitnum" name="unitnum" value = "">
        </div>
        <div class="form-group">
            <label for="streetnum">Street Number</label>
            <input type="number" class="form-control" id="streetnum" name="streetnum" required = "required" value = 123>
        </div>
        <div class="form-group">
            <label for="streetname">Street Name</label>
            <input type="string" class="form-control" id="streetname" name="streetname" required = "required" value = "Sesame Street">
        </div>
        <div class="form-group">
            <label for="suburb">Suburb</label>
            <input type="string" class="form-control" id="suburb" name="suburb" required = "required" value="Auckland">
        </div>
        <div class="form-group">
            <label for="destsuburb">Destination Suburb</label>
            <input type="string" class="form-control" id="destsuburb" name="destsuburb" required = "required" value = "Auckland">
        </div>
        <div class="form-group">
            <label for="pudate">Pick-Up Date</label>
            <?php
            $date = date("Y-m-d");
            ?>
            <input type="date" class="form-control" id="pudate" name="pudate" required = "required" value = <?php echo $date; ?>>
        </div>
        <div class="form-group">
            <label for="putime">Pick-Up Time</label>
            <?php
            $datey2 = date("h:i A");
            ?>
            <input type="time" class="form-control" id="putime" name="putime" required = "required" value=<?php echo $datey2; ?>>
        </div>
        <button type="submit" class="btn btn-special">Submit</button>
        <button type="reset" class="btn btn-special">Reset</button>
    </br>
        </br>
        </br>

    </form>
    </div>
</div>
</body>
</html>