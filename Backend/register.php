<?php
include('database.php');
$popup = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_name = $_POST['Name'];
    $user_mail = $_POST['Mail'];
    $user_mobile = $_POST['Mobile'];
    $user_pass = $_POST['Password'];
    $new_user = "INSERT INTO user (user_name, user_mail, user_mobile, user_pass) value ('$user_name','$user_mail', '$user_mobile', '$user_pass')";

    if (mysqli_query($conn, $new_user)) {
        header("Location:login.php");
    } else {
        $popup = ' Fail to Create Account ';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>JustRead</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand text-warning" href="index.php">Adu.in</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>
    <div class="register-photo">
        <div class="form-container">
            <form method="post" action="">
                <h2 class="text-center"><strong>Buat</strong> akun</h2>
                <input class="form-control" type="text" name="Name" required="" placeholder="Nama lengkap" minlength="3" maxlength="30">
                <input class="form-control" type="email" style="margin-top: 18px;" name="Mail" placeholder="Email" required="">
                <input class="form-control" type="tel" style="margin-top: 19px;" name="Mobile" placeholder="No Handphone" minlength="10" maxlength="10" required="">
                <input class="form-control" type="password" style="margin-top: 18px;" name="Password" placeholder="Password" required="" minlength="6" maxlength="7">
                <div class="form-group">
                    <div class="form-check" style="margin-top: 18px;"><label class="form-check-label"><input class="form-check-input" type="checkbox" required="">Saya setuju dengan persyaratan lisensi.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a class="already" href="login.php">Anda sudah memiliki akun? <strong>Login disini</strong>.</a>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>