<?php
include 'database.php';
include 'session.php';

$indo = file_get_contents('https://api.kawalcorona.com/indonesia');
$json = json_decode($indo);
foreach ($json as $indo) {
    $nama = $indo->name;
    $positif = $indo->positif;
    $sembuh = $indo->sembuh;
    $meninggal = $indo->meninggal;
    $dirawat = $indo->dirawat;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Beranda</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

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
                        <img src="assets/img/carousel-1.png" class="d-block w-100" alt="carousel">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/carousel-2.png" class="d-block w-100" alt="carousel">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/carousel-3.png" class="d-block w-100" alt="carousel">
                    </div>
                </div>
            </div>
    </header>


    <div class="article-dual-column">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro"></div>
                </div>
            </div>
            <div class=" daftar-aduan">
                <h1 class="text-center">Daftar Aduan<br></h1>
                <div class="table-responsive">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_list = mysqli_query(
                                $conn,
                                "SELECT * from complaints where user_id = '$ID'"
                            );
                            while ($list = mysqli_fetch_assoc($query_list)) { ?>

                                <tr>
                                    <td style="width: 10px;"><?php echo $list[
                                        'id'
                                    ]; ?></td>
                                    <td style="width: 250px;"><?php echo $list[
                                        'title'
                                    ]; ?></td>
                                    <td style="width: 50px;"><?php echo $list[
                                        'status'
                                    ]; ?></td>
                                    <td style="width: 50px;"><?php echo $list[
                                        'date'
                                    ]; ?></td>
                                    <td style="width: 160px;"><?php echo $list[
                                        'remark'
                                    ]; ?></td>
                                    <td style="width: 50px;"><button class="btn btn-primary text-right " style="" onClick="parent.location='lihat-aduan.php?id=<?php echo $list[
                                        'id'
                                    ]; ?>'">View</button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- coba-coba -->
    <div class="container-fluid update-covid">
        <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-5 mt-5">
            <h2>
                UPDATE COVID-19 DI INDONESIA
            </h1>
        </div>
    </div>
    </div>
    
    <div class="col-md-12 d-flex justify-content-center">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="card bg-primary ">
                    <div class="card-statistic-3 p-4 text-white">
                        <div class="mb-4 d-flex justify-content-center">
                            <h5 class="card-title mb-0">POSITIF</h5>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <h3 class="card-title mb-0">
                                <?php echo $positif; ?>
                            </h3>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="card bg-primary ">
                    <div class="card-statistic-3 p-4 text-white">
                        <div class="mb-4 d-flex justify-content-center">
                            <h5 class="card-title mb-0">SEMBUH</h5>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <h3 class="card-title mb-0">
                                <?php echo $sembuh; ?>
                            </h3>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="card bg-primary ">
                    <div class="card-statistic-3 p-4 text-white">
                        <div class="mb-4 d-flex justify-content-center">
                            <h5 class="card-title mb-0">MENINGGAL</h5>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <h3 class="card-title mb-0">
                                <?php echo $meninggal; ?>
                            </h3>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="card bg-primary ">
                    <div class="card-statistic-3 p-4 text-white">
                        <div class="mb-4 d-flex justify-content-center">
                            <h5 class="card-title mb-0">DIRAWAT</h5>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <h3 class="card-title mb-0">
                                <?php echo $dirawat; ?>
                            </h3>
                        </div>
                        
                    </div>
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