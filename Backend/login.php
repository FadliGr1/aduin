<?php
include('database.php');
$popup = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_mail = $_POST['Mail'];
    $user_pass = $_POST['Password'];

    $user_data = mysqli_query($conn, "SELECT * FROM user WHERE user_mail = '$user_mail' and user_pass = '$user_pass'");

    if ($row = mysqli_fetch_array($user_data)) {

        session_start();
        $_SESSION['ID'] = $row['user_id'];

        echo $row['user_id'];
        header("Location:index.php");
    } else {
        $popup = "Invalid Credential";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
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
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand text-warning" href="index.php">Adu.in</a>
            <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>
    <div></div>
    <div class="login-clean">
        <form method="post" action=""><?php echo $popup; ?>
            <div class="illustration">
                <i class="icon"><img src="assets/img/logo.svg" alt="" style="width: 184px; height: 90px" /></i>
            </div>
            <h2>Login Form</h2>
            <div class="form-group"><input class="form-control" type="email" name="Mail" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="Password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
            <a class="forgot" href="register.php">Belum punya akun ? <strong>Daftar Disini</strong></a>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>