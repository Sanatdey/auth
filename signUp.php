<?php
include "includes/header.php";
//include "includes/firebase.php";
// include "classes/users.class.php";
session_start();
// $user = new Users();
?>

<body>
    <div class="container">
        
        <h1>Sign Up</h1>
        <div id='msg'></div>
        <form id='sign-up'>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-primary" id='id1' name="">Submit</button> <a href="signIn.php" class="btn btn-danger" >cancel</a>  
        </form>
        <a class="my-5" href="signIn.php"> ALready a Member ? Click Here to Login.</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>

<script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>

<script defer src="./includes/firebaseConfig.js"></script>
<script defer src="./includes/auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
<?php include "includes/footer.php"; ?>