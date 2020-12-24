<?php
include "includes/firebase.php";

session_start();
session_destroy();

?>
<script>
    $(document).ready(function() {
        firebase.auth().signOut().then(function() {
            window.location = 'signIn.php';
        }).catch(function(error) {
            var err = document.getElementById('id');
            err.innerHTML = error.message;
        });
    });
</script>
<div id='iid'></div>