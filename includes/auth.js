const signup = document.querySelector("#sign-up");
if (signup) {
  signup.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = signup["email"].value;
    const password = signup["password"].value;
    const name = signup['name'].value;
    const phone = signup['phone'].value;
    
    const sub = signup["id1"];
    console.log(name);
    sub.innerHTML = "Please Wait...";
    sub.disable = true;
    firebase
      .auth()
      .createUserWithEmailAndPassword(email, password)
      .then((user) => {
        //console.log(user);
        firebase
          .auth()
          .currentUser.sendEmailVerification()
          .then((res) => {
            firebase
              .auth()
              .currentUser.updateProfile({
                displayName: name,
                photoURL: phone,
              })
              .then(function (up) {
                console.log(up);
                var suc = document.getElementById("msg");
                suc.innerHTML = "Your Account Created Successfully";
                suc.setAttribute("class", "alert alert-success");
                sub.innerHTML = "Submit";
                sub.disable = false;
              })
              .catch(function (error) {
                console.log(error);
              });
            console.log(res);
            firebase
              .auth()
              .signOut()
              .then(function () {
                window.location = "signIn.php";
              })
              .catch(function (error) {
                var err = document.getElementById("id");
                err.innerHTML = error.message;
              });
          })
          .catch((error) => {
            console.log(error);
            var err = document.getElementById("msg");
            err.innerHTML = error;
            err.setAttribute("class", "alert alert-danger");
            sub.innerHTML = "Submit";
            sub.disable = false;
          });
      })
      .catch((error) => {
        var errorCode = error.code;
        var errorMessage = showError(errorCode);
        // if(errorCode == 'auth/invalid-email'){errorMessage = "Please Enter Valid Email ";}
        console.log(errorCode);
        console.log(errorMessage);
        var err = document.getElementById("msg");
        err.innerHTML = errorMessage;
        err.setAttribute("class", "alert alert-danger");
        sub.innerHTML = "Submit";
      });
  });
}









const signin = document.querySelector("#sign-in");
if (signin) {
  signin.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = signin["email"].value;
    const password = signin["password"].value;
    const sub = signin["id2"];
    // console.log(email);
    sub.innerHTML = "Please Wait...";
    sub.disable = true;
    firebase
      .auth()
      .signInWithEmailAndPassword(email, password)
      .then((user) => {
        console.log(user);
        var suc = document.getElementById("msg");
        suc.innerHTML = "You Logged In Successfully";
        suc.setAttribute("class", "alert alert-success");
        sub.innerHTML = "Submit";
        window.location = "index.php";
      })
      .catch((error) => {
        var errorCode = error.code;
        var errorMessage = showError(errorCode);
        console.log(errorCode);
        var err = document.getElementById("msg");
        err.innerHTML = errorMessage;
        err.setAttribute("class", "alert alert-danger");
        sub.innerHTML = "Submit";
      });
  });
}
function showError(code) {
  if (code == "auth/email-already-in-use") {
    return "This Email ALready Exist , Please Try again with another email";
  } else if (code == "auth/user-not-found") {
    return "This Email does't Exist , Please create an Account";
  } else if (code == "auth/weak-password") {
    return "Please Enter Password of at least 6 Character";
  } else if (code == "auth/wrong-password") {
    return "Incorrect Login Credential";
  } else if (code == "auth/invalid-email") {
    return "Please Enter Valid Email ";
  } else {
    return "Something Went Wrong";
  }
}



