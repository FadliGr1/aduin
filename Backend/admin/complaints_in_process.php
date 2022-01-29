<?php
include 'database.php';
include 'session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Proses - Aduin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-user-edit"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Adu.in</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="complaints_all.php"><i class="fab fa-trello"></i><span>Pengaduan</span></a></li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="complaints_pending.php"><i class="fas fa-history"></i><span>Tertunda</span></a></li>
					<li class="nav-item" role="presentation"><a class="nav-link active" href="complaints_in_process.php"><i class="fas fa-sync"></i><span>Dalam Proses</span></a> </li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="complaints_solved.php"><i class="fas fa-check-circle"></i><span>Terselesaikan</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>logout</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button></div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Pengaduan Dalam Proses</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">daftar pengaduan sedang diproses</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
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
             "SELECT * from complaints where status = 'In Process'"
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
                                            <td style="width: 50px;"><button class="btn btn-primary"onClick="parent.location='view_complaint.php?id=<?php echo $list[
                                                'id'
                                            ]; ?>'">View</button></td>
                                        </tr>
									<?php }
         ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ADUIN</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>