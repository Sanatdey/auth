<?php
include "includes/header.php";
session_start();
?>

<body>
    <div class="container ">
        <h1>Sign IN</h1>
        <div id='msg'></div>
        <form id='phone-in'>
        <div class="mb-3 col-md-8">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
            
        </div>

        <div class='col-md-4'>
        <button class="btn btn-primary" id='id1' name="signin">Sent OTP</button> </div>
        </form>
        <form id='otp-in'>
        <div class="mb-3 col-md-8">
            <label for="otp" class="form-label">OTP</label>
            <input type="text" class="form-control" id="otp" name="otp" aria-describedby="emailHelp">
            
        </div>

        <div class='col-md-4'>
        <button class="btn btn-primary" id='id2' name="signin">Verify OTP</button> </div>
        </form>



    </div>
    <div id="recaptcha-container"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>

<script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>

<script defer src="./includes/firebaseConfig.js"></script>
<script defer src="./includes/authPhone.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   

</body>
<?php include "includes/footer.php"; ?>