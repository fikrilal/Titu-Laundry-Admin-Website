<?php
    session_start();
    require "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>
  <body>

    <section class="reset-password">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-5">
                <div class="reset">
                    <h1>OTP Verification</h1>
                    <p>Masukkan kode OTP yang telah dikirim ke alamat email milikmu</p>
                </div>

                <div class="reset-form">
                <form action="" method="post">
                    <!-- <label for="email" class="form-label">Kode OTP</label> -->
                    <input type="text" class="form-control" name="emailres" id="email" placeholder="kode verifikasi">
                    
                    <button class="resetBtn" name="resetBtn">Continue</button>
                </form>
                </div>
                <?php
                if(isset($_POST['resetBtn'])){
                    $emailres = htmlspecialchars($_POST['emailres']);
                    $query = mysqli_query($koneksi, "SELECT * FROM `register` WHERE kode_verifikasi='$emailres'");
                    $count = mysqli_num_rows($query);

                    if( $count > 0){
                        header("location:reset-new-password.php");
                    }
                    else{
                        ?>
                        <span class="text">Kode verfikasi salah</span>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>