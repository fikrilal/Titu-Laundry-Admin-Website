<?php
    session_start();

    if (!isset($_SESSION["ses"])) {
        echo "<script>
        eval(\"parent.location='../login.php '\");
        alert (' Anda harus login terlebih dahulu');
        </script>";
        exit;
    }
?>