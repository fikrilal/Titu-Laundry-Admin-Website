<?php

    if($_SESSION['logged_in'] == false) {
        header('location:login.php');
    }
?>