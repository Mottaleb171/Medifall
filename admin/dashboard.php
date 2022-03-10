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
    <?php
        $sql = "SELECT a_name, a_email FROM adminlogin_tb WHERE a_email='" . $aEmail . "' limit 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo '<h3 style="color: #007CC7"> Welcome Back, <b> ' . $row['a_name'] . '</b></h3>';

            }
        }
        ?>

        <h2 class="text-center  mb-4">Donor's List </h2>

        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center text-light bg-danger p-2">

                    <div class="card-body justify-center">
                        <h5>Individual Donation</h5>
                        <?php
							$sql="SELECT count(donorID) AS total FROM individualdonation";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total Donation Proposals: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="individual.php">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center text-light bg-info p-2">
                    <div class="card-body justify-center">
                        <h5>Organization Donation</h5>
                        <?php
							$sql="SELECT count(orgID) AS total FROM organizationdonation";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total Donation Proposals: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="organization.php">View</a>
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center text-light bg-warning p-2">
                    <div class="card-body justify-center">
                        <h5>Pharmaceutical Donation</h5>
                        <?php
							$sql="SELECT count(pharmaID) AS total FROM pharmadonation";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total Donation Proposals: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="pharma.php">View</a>
                    </div>

                </div>
            </div>


        </div>
    </div>
	
		<!-- request medicine -->
	<div class="part3 mt-4 mb-5 container">
		<h2 class="text-center">Medicine Requests List</h2>
		<div class="row">
		<div class="col-lg-12">
				<div class="card text-center text-light bg-info p-2">

					<div class="card-body justify-center">
						<h5>Requested for Medicine</h5>
						<?php
						$sql = "SELECT count(requestID) AS total FROM requestmedicine";
						$res = $conn->query($sql);
						$value = $res->fetch_assoc();
						$total_count = $value['total'];
						echo '<p>Total Pending Medicine Requests: ' . $total_count . '</p>';

						?>
						<a class="btn btn-outline-dark text-light" style="width:100px" href="viewRequest.php">View</a>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!--recntly upload -->
    <div class="jumbotron part2 ">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-3" id="recent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Recent Donation Proposals</h3>
                        </div>
                        <div class="col-sm-6 arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>

                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header text-center text-info">Individual Donation</div>
                        <div class="card-body">

                            <?php 
								$sql = "SELECT * FROM individualdonation ORDER BY donorID DESC LIMIT 3";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										echo '<ul>';
										echo '<li><p><b>Medicine name: </b>'.$row['medicine'].'</p></li>';
										echo '</ul>';
									}
								}
								?>

                        </div>

                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="card">
                        <div class="card-header text-center text-info">Organization Donation</div>
                        <div class="card-body">

                            <?php 
								$sql = "SELECT * FROM organizationdonation ORDER BY orgID DESC LIMIT 3";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										echo '<ul>';
										echo '<li><p><b>Medicine name: </b>'.$row['medicine'].'</p></li>';
										echo '</ul>';
									}
								}
								?>

                        </div>

                    </div>
                </div>


                <div class="col-sm-3">

                    <div class="card">
                        <div class="card-header text-center text-info">Pharmaceutical Donation</div>
                        <div class="card-body">

                            <?php 
								$sql = "SELECT * FROM pharmadonation order by pharmaID desc LIMIT 3";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										echo '<ul>';
										echo '<li><p><b>Medicine name: </b>'.$row['medicine'].'</p></li>';
										echo '</ul>';
									}
								}
								?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
	
	


    <?php include('includes/footer.php'); ?>
</body>

</html>