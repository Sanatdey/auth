<?php
include "includes/header.php";
include "includes/firebase.php"; ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<body onload="myFunction()">
<div class="container my-5">
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h2>Profile Data:</h2>
            <h5 class="card-title" id='id1'>Loading...</h5>
            <p class="card-text" id='id2'></p>
            <button class="btn btn-primary" onclick="pwd()">Password Reset</button>
            <button class="btn btn-primary" onclick="pwd1()">Logout</button> 
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<script>
    function myFunction() {
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                var s1 = document.getElementById('id1');
                var txt = "Name     : " + user.displayName + "<br>" + "Email    : " + user.email + "<br>Phone No : " + user.photoURL;
                s1.innerHTML = txt;
                var s2 = document.getElementById('id2');
                var s3 = document.getElementById('header-1');
                s3.innerHTML = 'Logout';
                s3.setAttribute("href", "logout.php");
                if (user.emailVerified) {
                    s2.innerHTML = "Verified : <img src='https://www.flaticon.com/svg/static/icons/svg/1271/1271380.svg' width='20px'>"
                } else {
                    s2.innerHTML = "Verified : <img src='https://s.clipartkey.com/mpngs/s/192-1921872_of-way-eighth-shield-shield-street-sign-risk.png' width='20px'>"
                }
                console.log(user.displayName);
                console.log(user);
            } else {
                window.location = 'signIn.php';
            }

        });

    };

    function pwd() {

        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                var auth = firebase.auth();
                auth.sendPasswordResetEmail(user.email).then(function(res) {
                    console.log(res)
                }).catch(function(error) {
                    alert('something went wrong');
                });

            }
        });

    };
        function pwd1() {

        firebase.auth().signOut().then(function() {
            window.location = 'signIn.php';
        }).catch(function(error) {
            var err = document.getElementById('id');
            err.innerHTML = error.message;
        });

    };
</script>
</body>
