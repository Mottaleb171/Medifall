<?php
include('../dbconnect.php');

  if(isset($_REQUEST['ExecutiveSignup'])){
    // Checking for Empty Fields
    if(($_REQUEST['ExecutiveName'] == "") || ($_REQUEST['ExecutiveEmail'] == "") || ($_REQUEST['ExecutivePassword'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT e_email FROM Executivelogin_tb WHERE e_email='".$_REQUEST['ExecutiveEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
        $ngoName = $_REQUEST['ngoName'];
        $ExecutiveName = $_REQUEST['ExecutiveName'];
        $ExecutiveEmail = $_REQUEST['ExecutiveEmail'];
        $ExecutivePassword = $_REQUEST['ExecutivePassword'];
        $sql = "INSERT INTO Executivelogin_tb(e_id, ngo_name, e_name, e_email, e_pass) VALUES ('','$ngoName','$ExecutiveName', '$ExecutiveEmail', '$ExecutivePassword')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }
      }
    }
  }
?>
<?php include('../headerfooter/header.php');  ?>
<div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account as Executive</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
            <div class="form-group">
                
                  <i class="fas fa-user"></i><label for="ngoName"><b>Select NGO</b></label>
                                <select class="form-control" name="ngoName" required>
                                    <option value="">Choose NGO</option>
                                   <?php 
								$sql = "SELECT ngo_name FROM ngologin_tb ";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
									
										?> <option value="<?php echo $row['ngo_name'];?>">
                                            <?php
                                            echo $row['ngo_name'];
									?></option>
                                    <?php
									}
								}
								?>
                                </select>
             </div>
              <!--  <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">NGO Name</label><input
                        type="text" class="form-control" placeholder="Name" name="ngoName">
                </div> -->
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Executive Name</label><input
                        type="text" class="form-control" placeholder="Name" name="ExecutiveName">
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input
                        type="email" class="form-control" placeholder="Email" name="ExecutiveEmail">
                    <!--Add text-white below if want text color white-->
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
                        Password</label><input type="password" class="form-control" placeholder="Password"
                        name="ExecutivePassword">
                </div>
                <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold"
                    name="ExecutiveSignup">Sign Up</button>
                <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
                    Policy and Cookie Policy.</em>
                <div class="text-center">
                    <p style="font-size:12px;">Already Have an Account?</p>
                </div>
                <div class="text-center"><a class="btn btn-success shadow-sm font-weight-bold"
                        href="ExecutiveLogin.php">Login</a></div>
                <?php if(isset($regmsg)) {echo $regmsg; } ?>
            </form>
        </div>
    </div>
</div>