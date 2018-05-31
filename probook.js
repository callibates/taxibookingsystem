/*
ID: 15905324
This file contains all of the javascript functions for the system
 */
// file simpleajax.js
// using POST method
/*
This function adds a booking into the database by passing it to the server
 */
function addBook(dataSource) {
    var xhr = createRequest();
    if (xhr) {
        var fname = document.getElementById('fname').value;
        var lname = document.getElementById('lname').value;
        var phone = document.getElementById('phone').value;
        var unitnum = document.getElementById('unitnum').value;
        var stnum = document.getElementById('streetnum').value;
        var stnam = document.getElementById('streetname').value;
        var suburb = document.getElementById('suburb').value;
        var destsub = document.getElementById('destsuburb').value;
        var pudate = document.getElementById('pudate').value;
        var putime = document.getElementById('putime').value;

        var name = fname + " " + lname;
        var address = "";
        if (unitnum == "") {
            address = stnum + " " + stnam;
        } else {
            address = unitnum + "/" + stnum + " " + stnam;
        }

        var status = "unassigned";
        var date = new Date().toISOString();
        var date2 = new Date();
        var mon = date2.getMonth() + 1;
        var day = date2.getDate();
        if (mon.toString().length == 1) {
            mon = "0" + mon;
        }
        if (day.toString().length == 1) {
            day = "0" + day;
        }
        var date3 = date2.getFullYear() + "-" + mon + "-" + day;
        var ctime = new Date();
        var min = ctime.getMinutes();
        var hour = ctime.getHours();
        if (min.toString().length == 1) {
            min = "0" + min;
        }
        if (hour.toString().length == 1) {
            hour = "0" + hour;
        }
        var cctime = hour + ":" + min + ":00";
        var booknum = Math.floor(Math.random() * 1000);
        var datetime = pudate + " " + putime;
        var requestbody = "num=" + booknum + " &name=" + encodeURIComponent(name) + " &phone=" + encodeURIComponent(phone) + " &address=" + encodeURIComponent(address) + " &sub=" + encodeURIComponent(suburb) + " &dest=" + encodeURIComponent(destsub) + " &pudate=" + encodeURIComponent(pudate) + " &datetime=" + encodeURIComponent(datetime) + "&date=" + encodeURIComponent(date) + " &ctime=" + encodeURIComponent(cctime) + " &status=" + encodeURIComponent(status) + " &thetime=" + encodeURIComponent(putime);

        if (pudate > date3) {
            console.log("pudate" + pudate + " date3" + date3);

            xhr.open("POST", dataSource, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                // alert(xhr.readyState); // to let us see the state of the computation
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                } // end if
            } // end anonymous call-back function
            xhr.send(requestbody);
            document.getElementById('myForm').reset();

        } else {
            console.log("putime" + putime + " cctime" + cctime);
            if (pudate == date3) {
                if (putime < cctime) {
                    alert("Please put a date and time that is after now.");
                } else {
                    console.log("pudate" + pudate + " date3" + date3);

                    xhr.open("POST", dataSource, true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {
                        // alert(xhr.readyState); // to let us see the state of the computation
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            alert(xhr.responseText);
                        } // end if
                    } // end anonymous call-back function
                    xhr.send(requestbody);
                    document.getElementById('myForm').reset();

                }
            } else {
                alert("Please put a date and time that is after now.");

            }
        }

        } // end if
    } // end function addBook()

    /*
    This function assigns a booking by passing the information to the server
     */
    function assign() {
        var xhr = createRequest();
        if (xhr) {

            var obj = document.getElementById('place');

            var num = document.getElementById('bnum').value;

            var requestbody = "num=" + num;
            xhr.open("POST", 'getbook.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                // alert(xhr.readyState); // to let us see the state of the computation
                if (xhr.readyState == 4 && xhr.status == 200) {
                    //obj.innerHTML = xhr.responseText;
                    alert(xhr.responseText);
                    obj.innerHTML = "";
                } // end if
            } // end anonymous call-back function
            xhr.send(requestbody);
            document.getElementById('formy').reset();

        }
    }

    /*
    This function shows all bookings by passing information to the server
     */
    function showall() {
        var xhr = createRequest();
        if (xhr) {
            var obj = document.getElementById('place');

            xhr.open("POST", 'getallbook.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                // alert(xhr.readyState); // to let us see the state of the computation
                if (xhr.readyState == 4 && xhr.status == 200) {
                    obj.innerHTML = xhr.responseText;
                } // end if
            } // end anonymous call-back function
            xhr.send();
            document.getElementById('formy').reset();

        }
    }



