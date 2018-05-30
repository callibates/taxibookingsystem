
// file simpleajax.js
// using POST method
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

            var address = unitnum + "/" + stnum + " " + stnam;

            var status = "unassigned";
            var date = new Date().toISOString();
            var ctime = new Date();
            var cctime = ctime.getHours() + ":" + ctime.getMinutes() + ":00";
            var booknum = Math.floor(Math.random() * 1000);
          //  var nicedate = new Date(pudate).toDateString();
            var datetime = pudate + " " + putime;
            var requestbody = "num=" + booknum + " &name=" + encodeURIComponent(name) + " &phone=" + encodeURIComponent(phone) + " &address=" + encodeURIComponent(address) + " &sub=" + encodeURIComponent(suburb) + " &dest=" + encodeURIComponent(destsub) + " &pudate=" + encodeURIComponent(pudate) + " &datetime=" + encodeURIComponent(datetime) + "&date=" + encodeURIComponent(date) + " &ctime=" + encodeURIComponent(cctime) + " &status=" + encodeURIComponent(status);

            if(pudate < date){
                alert("Please put a date that is not before today's date.");
            }else {
                console.log("DATE = " + pudate);
                console.log("TIME = " + datetime + "|");

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

        } // end if
    } // end function addBook()

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
                    obj.innerHTML = xhr.responseText;
                } // end if
            } // end anonymous call-back function
            xhr.send(requestbody);
            document.getElementById('formy').reset();

        }
    }

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


