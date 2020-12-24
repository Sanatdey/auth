<?php
include "includes/header.php";
session_start();
?>

<body>
   <div class="container">
      <h1>Forget Password</h1>
      <div id='msg'></div>
      <form id='forget'>
         <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
         </div>
         <button class="btn btn-primary" id='f' name="forget">Forget</button>
      </form>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>

   <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
   <script defer src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>

   <script defer src="./includes/firebaseConfig.js"></script>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
<?php include "includes/footer.php"; ?>

<script>
   const f = document.querySelector("#forget");
   if (f) {
      f.addEventListener("submit", (e) => {
         e.preventDefault();
         const email = f["email"].value;
         const sub = f["f"];
         // console.log(email);
         sub.innerHTML = "Please Wait...";
         var auth = firebase.auth();
         auth.sendPasswordResetEmail(email).then(function(res) {
            var suc = document.getElementById("msg");
            suc.innerHTML = "Your Password Reset Link is Sent IN your email";
            suc.setAttribute("class", "alert alert-success");
            sub.innerHTML = "Forget";
            console.log(res);
         }).catch(function(error) {
            alert('something went wrong');
            console.log(res);
         });

      });

   }
</script>