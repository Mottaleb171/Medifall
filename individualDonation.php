<?php
include('dbconnect.php');
session_start();
if (isset($_SESSION['is_individuallogin'])) {
    $iniEmail = $_SESSION['iniEmail'];
} else {
    echo "<script> location.href='New/individualLogin.php'; </script>";
}

if (isset($_REQUEST['submit'])) {

    $donor = $_REQUEST['donor'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $upzilla = $_REQUEST['upzilla'];
    $district = $_REQUEST['district'];
    $medicine = $_REQUEST['medicine'];
    $quantity = $_REQUEST['quantity'];
    $phone = $_REQUEST['phone'];
    $date = $_REQUEST['date'];
    $sql = "INSERT into  individualdonation(donorID,donorName,email,address,upzilla,district,medicine,quantity,phone,daate) values('','$donor','$email','$address','$upzilla','$district','$medicine','$quantity','$phone','$date')";
    if ($conn->query($sql) == true) {
        $msg = '<div class="alert alert-success mt-3 text-center">Donation Proposal Sent, We will Contact With You Soon!</div>';
    } else {
        $msg = '<div class="alert alert-warning mt-3 text-center">Failed to Send Donation Proposal, Please Try Again!</div>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include('headerfooter/header.php'); ?>
    <title>Medifall: Individual Donation</title>
    <link rel="icon" href="img/icon.png">
    <style type="text/css">
        #header {
            color: #1F7A79;
        }

        #header p {
            margin-top: 10px;
            padding-top: 10px;
            text-align: justify;
        }

        .form-group {
            border-radius: 20px;
            box-shadow: 8px 8px 5px gray;

        }

        label {
            line-height: 1px;
        }
    </style>
</head>

<body>
    <?php include('headerfooter/nav.php'); ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-6">
                <img src="img/orgdonation.png" style="width: 600px; height: 500px;">

            </div>

            <div class="col-lg-6 mt-5" id="header">

                <h1 class="text-right">Individual Donation</h1>
                <p>Individual Donors can donate their unused medicine on our website easily. If you want to donate your
                    unused medicine individually, you can do it without paying any shipping cost. No matter what
                    quantity you have left.</p>
            </div>
        </div>
    </div>
    <div class="container col-md-5">
        <form class="form-group border border-info p-4 mb-5 mt-5" method="POST" action="">
            <h4 class="text-center">Individual Donation Form</h4>
            <p class="text-center text-weight-bold text-danger">All credit goes to Medifall</p>

            <div class="text-secondary">

                <label for="user" class="mt-3"><i class="far fa-user pr-2"></i>Name</label>
                <input type="user" name="donor" class="form-control">

                <label for="email" class="mt-3"><i class="far fa-envelope pr-2"></i>Email</label>
                <input type="email" name="email" class="form-control" required>

                <label for="address" class="mt-3"><i class="fas fa-map-pin pr-2"></i>Address</label>
                <input type="text" name="address" class="form-control" required>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="district" class="mt-3"><i class="fas fa-map-marker-alt pr-2"></i>District</label>
                        <?php include('district_list.php'); ?>
                    </div>
                    <div class="col-lg-6">
                        <label for="upzilla" class="mt-3"><i class="fas fa-location-arrow pr-2"></i>Upazila/Thana</label>
                        <input type="text" name="upzilla" class="form-control" required>
                    </div>


                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <label for="medicine" class="mt-3"><i class="fas fa-pills pr-2 text-secondary"></i>Medicine
                            Name</label>
                            <input type="text" name="medicine" class="form-control" placeholder="Medicine1, Medicine 2,...." required>
                    </div>

                    <div class="col-lg-6">
                        <label for="medicine" class="mt-3 text-secondary"><i class="fas fa-sort-amount-up-alt pr-2 text-secondary"></i>Quantity
                            <small>(pcs)</small></label>
                        <input type="number" name="quantity" min="10" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="phone" class="mt-3"><i class="fas fa-phone-volume pr-2"></i>Contact Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="date" class="mt-3"><i class="far fa-calendar-plus pr-2"></i>Date</label>
                        <input type="datetime-local" name="date" class="form-control" required>
                    </div>
                </div>

            </div>
            <button type="submit" name="submit" class=" btn btn-outline-info form-control mt-3">Submit</button>
            <a href="New/individual_logout.php" class="btn btn-outline-danger form-control mt-3"> Log out</a>

            <?php if (isset($msg)) {
                echo $msg;
            } ?>


        </form>

    </div>

    </form>
    </div>
    </div>

    <?php include('headerfooter/footer.php'); ?>

</body>

</html>