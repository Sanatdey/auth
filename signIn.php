<?php
include "includes/header.php";
session_start();
?>

<body>
    <div class="container">
        <h1>Sign IN</h1>
        <div id='msg'></div>
        <form id='sign-in'>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-primary" id='id2' name="signin">Submit</button><a href="test.php" class="btn btn-primary">Forget Password?</a> 
        </form>
    </div>      <a class="my-5" href="signUp.php"> Not a Member ? Click Here to Create An Account.</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>

<script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>

<script defer src="./includes/firebaseConfig.js"></script>
<script defer src="./includes/auth.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   

</body>
<?php include "includes/footer.php"; ?>