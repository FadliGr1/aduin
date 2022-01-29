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
    <title>Detail - Aduin</title>
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
					<li class="nav-item" role="presentation"><a class="nav-link" href="complaints_in_process.php"><i class="fas fa-sync"></i><span>Dalam Proses</span></a> </li>
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
                    <h3 class="text-dark mb-4">Detail Pengaduan</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
									<?php
         $query_complaint = mysqli_query(
             $conn,
             "SELECT * from complaints where id = '$id'"
         );
         $fetch_complaint = mysqli_fetch_array($query_complaint);
         ?>
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold"><?php echo $fetch_complaint[
                                                'title'
                                            ]; ?></p>
                                        </div>
                                        <div class="card-body">
											<div class="form-row">
												<div class="col">
													<div class="form-group"><label for="username"><strong>Kategori Aduan : </strong> <?php echo $fetch_complaint[
                 'category'
             ]; ?></label></div>
													<div class="form-group" style="margin-bottom: 0px;"><label for="username"><strong>Detail Aduan :</strong></label></div>
														<p style="padding-left: 100px;"><?php echo nl2br(
                  $fetch_complaint['details']
              ); ?></p>
													<div class="form-group"><label for="username"><strong>Tanggal : </strong> <?php echo $fetch_complaint[
                 'date'
             ]; ?></label></div>
													<div class="form-group"><label for="username"><strong>Status: </strong> <?php echo $fetch_complaint[
                 'status'
             ]; ?></label></div>
													<div class="form-group"><label for="username"><strong>Keterangan :  <span ><?php echo nl2br(
                 $fetch_complaint['remark']
             ); ?> </strong><span></label></div>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php if ($fetch_complaint['status'] != 'Solved') { ?>
							<div class="col">
								<form action="" method="POST">
									<div class="card shadow mb-3">
										<div class="card-header py-3">
											<p class="text-primary m-0 font-weight-bold"><label for="signature" style="color: rgb(255,15,0);"><strong>Keterangan*</strong><br></label></p>
										</div>
										<div class="card-header py-3"><p class="text-primary m-0 font-weight-bold">ID Aduan = <?php echo $fetch_complaint[
              'id'
          ]; ?></p></div>
										<div class="card-body"><label for="signature" style="color: #4E73DF;"><strong>Status*</strong><br></label>
											<select class="flex-fill" name="status" required="" style="margin: 15px;">
												<optgroup label="Select Status">
													<option value="In Process">In Process</option>
													<option value="Solved">Solved</option>
												</optgroup>
											</select>
											<div class="form-row">
												<div class="col">
														<div class="form-group"><textarea class="form-control" rows="4" name="remark" required=""></textarea></div>
														<div class="form-group"><button class="btn btn-primary btn-sm" value="submit" type="submit">PERBARUI</button></div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						<?php } ?>
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