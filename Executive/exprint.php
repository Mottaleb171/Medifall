<?php include('../dbconnect.php');

session_start();
 if(isset($_SESSION['is_Executivelogin'])){
  $ExecutiveEmail = $_SESSION['ExecutiveEmail'];
 // $ngoPassword = $_SESSION['ngoPassword'];
 } else {
  echo "<script> location.href='ExecutiveLogin.php'; </script>";
 }
?>

<?php
if (isset($_REQUEST['assign'])) {
    $sql="SELECT donorID,donor,medicine,quantity,`address`,upzilla,district,executive,phone,daate,`status`  FROM executive_assign_indi WHERE donorID={$_REQUEST['donorID']}";
    $res=$conn->query($sql);
     $row=$res->fetch_assoc();

        
        $donorID=$ROW['donorID'];
        $donor=$row['donor'];
        $medicine=$row['medicine'];
        $quantity=$row['quantity'];

        $address=$row['address'];
        $upzilla=$row['upzilla'];
        $district=$row['district'];
        $executive=$row['executive'];
        $phone=$row['phone'];
        $date=$row['date'];
        $status=$row['status'];

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script src="https://kit.fontawesome.com/76235dc605.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container mt-5 bordered bordered-info">
		<div class="bordered bordered-info">
		<h3 class="text-info my-4">Medicine Collection's Form</h3>
		<?php
        if (isset($_REQUEST['assign'])) {
            $sql="SELECT donorID,donor,medicine,quantity,`address`,upzilla,district,executive,phone,daate,`status`  FROM executive_assign_indi WHERE donorID={$_REQUEST['donorID']}";
            $res=$conn->query($sql);
             $row=$res->fetch_assoc();
			echo '<strong>Donor ID: </strong>'.$row['donor'].'<br>';
			echo '<strong>Donor: </strong>'.$donor.'<br>';
			echo '<strong>Collected Medicine: </strong>'.$medicine.'<br>';
			echo '<strong>Quantity: </strong>'.$quantity.'<br>';

			echo '<strong>Address: </strong>'.$address.'<br>';
			echo '<strong>Upzilla: </strong>'.$upzilla.'<br>';
			echo '<strong>District: </strong>'.$district.'<br>';
			echo '<strong>Executive/Collector: </strong>'.$executive.'<br>';

			echo '<strong>Donor Phone: </strong>'.$phone.'<br>';
			echo '<strong>Collection Date: </strong>'.$date.'<br>';
			echo '<strong>Collectetion Status: </strong>'.$status.'<br>';
        }

		?>
		<button onclick="window.print()" class="btn btn-danger mt-3"><i class="fas fa-print pr-2"></i>Print this document</button>
	</div>
	</div>
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


