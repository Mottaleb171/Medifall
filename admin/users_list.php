<?php 
include('../dbconnect.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>

<!DOCTYPE html>
<style>
.empty_space{
	height:260px;
}
</style>
<html>

<head>
    <?php include('../headerfooter/header.php');?>

    <title>Medifall: Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="custom.css">

</head>

<body>
    <?php include('includes/nav.php'); ?>

    <div class="part1 container mt-5 mb-5">

        <h2 class="text-center  mb-4">Users List </h2>

        <div class="row">
            <div class="col-sm-3">
                <div class="card text-center text-light bg-danger p-2">

                    <div class="card-body justify-center">
                        <h5>Individual Users List</h5>
                        <?php
							$sql="SELECT count(in_login_id) AS total FROM individuallogin_tb";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total User: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="individual_users_list.php">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card text-center text-light bg-info p-2">
                    <div class="card-body justify-center">
                        <h5>Organization Users List</h5>
                        <?php
							$sql="SELECT count(org_id) AS total FROM orglogin_tb";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total User: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="organization_users_list.php">View</a>
                    </div>

                </div>
            </div>

            <div class="col-sm-3">
                <div class="card text-center text-light bg-warning p-2">
                    <div class="card-body justify-center">
                        <h5>Pharmaceutical Users List</h5>
                        <?php
							$sql="SELECT count(pha_id) AS total FROM pharmalogin_tb";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total User: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="pharma_users_list.php">View</a>
                    </div>

                </div>
            </div>
			 <div class="col-sm-3">
                <div class="card text-center text-light bg-success p-2">
                    <div class="card-body justify-center">
                        <h5>NGOs List List</h5>
                        <?php
							$sql="SELECT count(ngo_name) AS total FROM ngologin_tb";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total User: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="ngo_list.php">View</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
	<div class="empty_space">
	 </div>
	
	    <?php include('includes/footer.php'); ?>
</body>

</html>