<?php
define('TITLE', 'Change NGO Password');
include('../dbconnect.php');
include('../headerfooter/header.php'); 
session_start();
if (isset($_SESSION['is_ngologin'])) {
    $ngoEmail = $_SESSION['ngoEmail'];
} else {
    echo "<script> location.href='NgoLogin.php'; </script>";
}
 $ngoEmail = $_SESSION['ngoEmail'];
 if(isset($_REQUEST['passupdate'])){
  if(($_REQUEST['ngoPassword'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM ngologin_tb WHERE ngo_email='$ngoEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $ngoPassword = $_REQUEST['ngoPassword'];
     $sql = "UPDATE ngologin_tb SET ngo_pass = '$ngoPassword' WHERE ngo_email = '$ngoEmail'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
}
?>
<p class="mt-5 text-center" style="font-size: 20px;"><span>Change Password</span>
</p>
<div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
        <div class="col-sm-6 col-md-4">
            <form class="mt-1 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value=" <?php echo $ngoEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password"
                        name="ngoPassword">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg; } ?>
            </form>
            <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="NgoDashboard.php">Back
                    to Dashboard</a></div>
        </div>
    </div>
</div>
</div>
</div>