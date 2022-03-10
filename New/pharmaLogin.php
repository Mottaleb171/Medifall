<?php
include('../dbconnect.php');
session_start();

if(!isset($_SESSION['is_pharmalogin'])){
  if(isset($_REQUEST['phaEmail'])){
    $phaEmail = mysqli_real_escape_string($conn,trim($_REQUEST['phaEmail']));
    $phaPassword = mysqli_real_escape_string($conn,trim($_REQUEST['phaPassword']));
    $sql = "SELECT pha_email, pha_pass FROM pharmalogin_tb WHERE pha_email='".$phaEmail."' AND pha_pass='".$phaPassword."' limit 1";
    $result = $conn->query($sql);
    
    if($result->num_rows == 1){
      $_SESSION['is_pharmalogin'] = true;
      $_SESSION['phaEmail'] = $phaEmail;
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='../pharmaceutical.php'; </script>";
      exit;
    }

    else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} 
else {
  echo "<script> location.href='../pharmaceutical.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <?php include('../headerfooter/header.php');  ?>

    <style>
    .custom-margin {
        margin-top: 8vh;
    }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="mb-3 text-center mt-5" style="font-size: 30px;">
        <i class="fas fa-pills"></i>
        <span>Medifall</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fas fa-clinic-medical text-danger"></i> <span>Login as
            Pharmaceutical</span>
    </p>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input
                            type="email" class="form-control" placeholder="Email" name="phaEmail">
                        <!--Add text-white below if want text color white-->
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input
                            type="password" class="form-control" placeholder="Password" name="phaPassword">
                    </div>
                    <button type="submit"
                        class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Login</button>
                    <?php if(isset($msg)) {echo $msg; } ?>
                </form>
                <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold"
                        href="../index.php">Back
                        to Home</a></div>
                <div class="text-center"><a class="btn btn-success mt-3 shadow-sm font-weight-bold"
                        href="pharmaReg.php">Create an Account Here...</a></div>
            </div>
        </div>
    </div>

    <!-- Boostrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>