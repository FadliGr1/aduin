<?php
include 'database.php';
include 'session.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location:index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $date = date('Y-m-d') . ' ' . date('h:i:s');
    $remark = $date . "\n" . $_POST['remark'];

    $update_query = mysqli_query(
        $conn,
        "UPDATE complaints SET status = '$status', remark = '$remark' where id = '$id'"
    );
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>View Aduan</title>
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
                        <img src="assets/img/header-terimakasih.png" class="d-block w-100" alt="carousel">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <article></article>
    <div class="article-dual-column">
        <div class="container content-view">
            <div class="col d-lg-flex justify-content-lg-center" class="row">
                <?php
                $query_complaint = mysqli_query(
                    $conn,
                    "SELECT * from complaints where id = '$id'"
                );
                $fetch_complaint = mysqli_fetch_array($query_complaint);
                ?>
                <div class="card shadow mb-3 card-lihat-aduan">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold"><?php echo $fetch_complaint['title']; ?></p>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="username"><strong>ID Aduan: #</strong><?php echo $fetch_complaint['id']; ?></label></div>
                                <div class="form-group"><label for="username"><strong>Kategori Aduan: </strong> <?php echo $fetch_complaint['category']; ?></label></div>
                                <div class="form-group lihat-deskripsi-aduan"><label for="username"><strong>Deskripsi Aduan</strong></label></div>
                                <p><?php echo nl2br(
                                        $fetch_complaint['details']
                                    ); ?></p>
                                <div class="form-group"><label for="username"><strong>Tanggal pengaduan: </strong> <?php echo $fetch_complaint['date']; ?></label></div>
                                <div class="form-group"><label for="username"><strong>Status: </strong> <?php echo $fetch_complaint['status']; ?></label></div>
                                <div class="form-group"><label for="username"><strong>Keterangan: </strong> <span style="color: rgb(255,15,0);"><?php echo nl2br(
                                                                                                                                                    $fetch_complaint['remark']
                                                                                                                                                ); ?><span></label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-lihat-backhome" onClick="parent.location='index.php'" style="filter: blur(0px) brightness(97%) grayscale(0%);margin: 5px;padding: 8px;" type="button">home</button>
                    <form method="POST" action="update-aduan.php">
                        <button class="btn btn-lihat-edit" style="filter: blur(0px) brightness(97%) grayscale(0%);margin: 5px;padding: 8px;" name="c_id" value="<?php echo $fetch_complaint['id']; ?>" type="submit" <?php if ($fetch_complaint['status'] != 'Menunggu') {
                                                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                                                        } ?>>edit</button>
                    </form>
                    <form method="POST" action="hapus-aduan.php">
                        <button class="btn btn-lihat-delete" style="filter: blur(0px) brightness(97%) grayscale(0%);margin: 5px;padding: 8px;" name="id" value="<?php echo $fetch_complaint['id']; ?>" type="submit" <?php if ($fetch_complaint['status'] != 'Menunggu') {
                                                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                                                        } ?>>Hapus</button>
                    </form>
                </div>
            </div>
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