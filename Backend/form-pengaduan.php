<?php
include('database.php');
include('session.php');
$popup = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $details = $_POST['details'];
    $date = date("Y-m-d");
    $category = $_POST['category'];
    $remark = "Belum dilihat";
    $status = 'Menunggu';
    $new_complaint = "INSERT INTO complaints (user_id, title, category, details, remark, status, date) value ('$ID','$title', '$category', '$details', '$remark', '$status', '$date')";
    
    if (mysqli_query($conn, $new_complaint)) {
        $get_id = mysqli_query($conn, "SELECT * from complaints where title = '$title'");
        $get_array = mysqli_fetch_array($get_id);
        $link = "lihat-aduan.php?id=" . $get_array['id'];
        header("Location:$link");
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
    <title>Form laporan aduan</title>
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
        <div class="container"><a class="navbar-brand text-warning" href="index.php">Adu.in</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link text-warning" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-warning" href="form-pengaduan.php">Laporkan Aduan</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-warning" href="tentang.html">Tentang</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-warning" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="carousel-image">
            <div id="my-slider" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/header-form.png" class="d-block w-100" alt="carousel">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <div class="article-dual-column">
        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <p style="margin-bottom: 00px;"><strong>Judul Aduan</strong></p>
                        <input type="text" style="max-width: 100%;min-width: 100%; min-height: 50px;" required="" minlength="4" maxlength="50" name="title">
                        <p style="margin-bottom: 00px;">
                            <strong>Kategori Aduan&nbsp;</strong>
                        </p>
                        <select class="flex-fill" name="category" required="" style="margin: 15px;">
                            <optgroup label="Select Status">
                                <option value="Layanan Publik">Layanan Publik</option>
                                <option value="Layanan Kesehatan">Layanan kesehatan</option>
                                <option value="Layanan Transportasi">Layanan Transportasi</option>
                            </optgroup>
                        </select>
                        <div class="intro"></div>
                        <p style="margin-bottom: 00px;">
                            <strong>Detail Aduan</strong>
                        </p>
                        <textarea style="max-width: 100%;min-width: 100%;min-height: 200px;" required="" minlength="20" name="details" maxlength="65000"></textarea>
                        
                            <div class="row">
                                <div class="col text-center" style="padding-top: 15px;">
                                    <button class="btn btn-primary text-center" type="submit">Submit</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Footer Start-->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="box">
                    <div class="icon">
                        <span class="fa fa-phone"></span>
                    </div>
                    <h4>Phone</h4>
                    <p><a href="#">+62812345678</a></p>
                </div>
                <div class="box">
                    <div class="icon">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <h4>Email</h4>
                    <p><a href="#">layananaduan@gmail.com</a></p>
                </div>
                <div class="box">
                    <div class="icon">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <h4>Location</h4>
                    <p><a href="#">Indonesia</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer End-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>