$("#otp-in").hide();

const ph = document.querySelector("#phone-in");
if (ph) {
  ph.addEventListener("submit", (e) => {
    e.preventDefault();
    const phone = ph["phone"].value;
    const sub = ph["id1"];
    sub.innerHTML = "Please Wait...";
    sub.disable = true;
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier("id1", {
      size: "invisible",
      callback: function (response) {
        console.log(response);
      },
      "expired-callback": function () {
        console.log("Capcha Expired");
        var err = document.getElementById("msg");
        err.innerHTML = "Capcha Expired";
        err.setAttribute("class", "alert alert-danger");
        sub.innerHTML = "Sent OTP";
      },
    });
    var appVerifier = window.recaptchaVerifier;
    firebase
      .auth()
      .signInWithPhoneNumber(phone, appVerifier)
      .then(function (confirmationResult) {
        console.log(confirmationResult);
        window.confirmationResult = confirmationResult;
        var suc = document.getElementById("msg");
        suc.innerHTML = "Your OTP sent Successfully";
        suc.setAttribute("class", "alert alert-success");
        sub.innerHTML = "Sent OTP";
        sub.disable = false;
        $("#phone-in").hide();
        $("#otp-in").show();
      })
      .catch(function (error) {
        console.log(error);
        var err = document.getElementById("msg");
        if(error.code == "auth/invalid-phone-number"){err.innerHTML = "Please Enter a Valid Phone Number";}
        if(error.code = "auth/too-many-requests"){err.innerHTML = "Please Enter a Valid Phone Number";}
        err.setAttribute("class", "alert alert-danger");
        sub.innerHTML = "Sent OTP";
      });
  });
}

const ot = document.querySelector("#otp-in");
if (ot) {
  ot.addEventListener("submit", (e) => {
    e.preventDefault();
    const otp = ot["otp"].value;
    const sub = ot["id2"];
    sub.innerHTML = "Please Wait...";
    sub.disable = true;
    confirmationResult
      .confirm(otp)
      .then(function (result) {
        var user = result.user;
        console.log(result);
        var suc = document.getElementById("msg");
        suc.innerHTML = "Your Account Created Successfully";
        suc.setAttribute("class", "alert alert-success");
        sub.innerHTML = "Verify OTP";
        sub.disable = false;
        firebase
          .auth()
          .signOut()
          .then(function () {
            window.location.reload();
          })
          .catch(function (error) {
            console.log(error);
          });
        $("#phone-in").show();
        $("#otp-in").hide();
      })
      .catch(function (error) {
        console.log(error);
        var err = document.getElementById("msg");
        err.innerHTML = error.message;
        err.setAttribute("class", "alert alert-danger");
        sub.innerHTML = "Sent OTP";
      });
  });
}
