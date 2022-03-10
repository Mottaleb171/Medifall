<html lang="en">
<?php
include('../dbconnect.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'; </script>";
}
//accessing $conn variable
$results = "SELECT * FROM requestmedicine";
?>


<head>
    <?php include('../headerfooter/header.php'); ?>

    <title>Medifall: Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <style type="text/css">
        #assignbox {
            height: 600px;
            border-radius: 20px;
            overflow: hidden;
            background: #ecf0f3;
            box-shadow: inset 5px 5px 3px gray,
                inset -5px -5px 3px white;
        }

        .scroll_down {
            margin-left: auto;
            margin-right: auto;

        }
    </style>
    <script>
        function ConfirmDelete() {
            return confirm("Are you sure you want to delete?");
        }
    </script>


</head>

<body>
    <?php include('includes/nav.php'); ?>
    <h3 class="text-center text-secondary mt-5">Medicine Requests</h3>
    <div class="text-center"><a href="#scroll_down" class="btn btn-warning scroll_down mb-2"><i class="fas fa-sort-down"></i>Active Scroll Down</a>
    </div>


    <?php
    $result = $conn->query($results);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

    ?>
            <div class="card ml-auto mr-auto" style="width: 1100px; border:1px solid gray">
                <div class="row ">
                    <div class="col-md-8">
                        <img style="height: 580px; width: 800px;" src="uploads/<?php echo $row['files']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h5 class="card-title">Requester Details</h5>
                            <p class="card-text"><b> Request ID:</b> <?php echo $row['requestID']; ?></p>
                            <p class="card-text"><b> Name:</b> <?php echo $row['name']; ?></p>
                            <p class="card-text"><b>Email:</b> <?php echo $row['email']; ?></p>
                            <p class="card-text"><b>Area:</b> <?php echo $row['area']; ?></p>
                            <p class="card-text"><b>Upazila:</b> <?php echo $row['upzilla']; ?></p>
                            <p class="card-text"><b>District:</b> <?php echo $row['district']; ?></p>
                            <p class="card-text"><b>Medicine Name:</b> <?php echo $row['medicine']; ?></p>
                            <p class="card-text"><b>Quantity:</b> <?php echo $row['quantity']; ?></p>
                            <p class="card-text"><b>Phone:</b> <?php echo $row['phone']; ?></p>
                            <p class="card-text"><b>Date and Time:</b> <?php echo $row['daatetimee']; ?></p>
                            <p class="card-text"><b>Status:</b> <?php echo $row['status']; ?></p>
                            <p class="card-text"><b>Reason:</b> <?php echo $row['reason']; ?></p>


                            <?php

                            echo '<form method="POST" >';
                            echo '<input type="hidden" name="requestID" value=' . $row["requestID"] . '>';
                            echo '<input type="hidden" name="name" value=' . $row["name"] . '>';
                            echo '<input type="hidden" name="medicine" value=' . $row["medicine"] . '>';
                            echo '<input type="hidden" name="quantity" value=' . $row["quantity"] . '>';
                            echo '<input type="hidden" name="area" value=' . $row["area"] . '>';
                            echo '<input type="hidden" name="upzilla" value=' . $row["upzilla"] . '>';
                            echo '<input type="hidden" name="district" value=' . $row["district"] . '>';
                            echo '<input type="hidden" name="phone" value=' . $row["phone"] . '>';
                            echo '<input type="hidden" name="daatetimee" value=' . $row["daatetimee"] . '>';
                            echo '<input type="hidden" name="status" value=' . $row["status"] . '>';
                            echo '<input type="hidden" name="reason" value=' . $row["reason"] . '>';

                            echo '<input type="submit" name="view" class="btn btn-info" value="Assign">';
                            echo '<input type="submit" name="close" class="btn btn-dark ml-2" value="Delete" Onclick="return ConfirmDelete()"></input>';
                            echo '</form>';

                            ?>
                        </div>
                    </div>
                </div>
                <!-- button -->
            </div>
    <?php }
    } ?>
    <!-- view -->
    <?php
    if (isset($_REQUEST['view'])) //click view button then show details in assign form 
    {
        // code...
        $sql = "SELECT requestID,name,email,area,upzilla,district,medicine,quantity,phone,daatetimee FROM requestmedicine WHERE requestID={$_REQUEST['requestID']}";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
    }
    ?>
    <!-- delete -->
    <?php
    if (isset($_REQUEST['close'])) {
        $sql = "DELETE FROM requestmedicine WHERE requestID = {$_REQUEST['requestID']}";
        if ($conn->query($sql) === TRUE) {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>


    <!-- Assign  -->
    <?php
    if (isset($_REQUEST['assign'])) {
        $sql = "SELECT requestID,name,email,area,upzilla,district,medicine,quantity,phone,daatetimee FROM requestmedicine where requestID={$_REQUEST['requestID']}";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        // code...
        $id = $_REQUEST['requestID'];
        $donor = $_REQUEST['name'];
        $medicine = $_REQUEST['medicine'];

        $quantity = $_REQUEST['quantity'];
        $area = $_REQUEST['area'];
        $upzilla = $_REQUEST['upzilla'];

        $district = $_REQUEST['district'];
        $ngo = $_REQUEST['ngo'];
        $phone = $_REQUEST['phone'];
        $date = $_REQUEST['date'];

        //insertion....
        $sql = "INSERT INTO assign_request(reqID,name,medicine,quantity,address,upzilla,district,ngo,phone,date) VALUES('$id','$donor','$medicine','$quantity','$area','$upzilla','$district','$ngo','$phone','$date')";
        $result = $conn->query($sql);
        if ($result == true) {

    ?>

            <script>
                alert('Succesfully Assigned To NGO');
            </script>
        <?php
        } else {
        ?>

            <script>
                alert('Failed to Assign');
            </script>
        <?php
        }

        ?>
        <?php
        $sql = "UPDATE requestmedicine SET status = 'Assigned To NGO' WHERE requestID={$_REQUEST['requestID']}";
        $res = $conn->query($sql);
        ?>

        <script>
            window.location.href = 'viewRequest.php';
        </script>
    <?php

    }
    ?>



    <!--form_-->
    <div id="scroll_down">
        <div class="container mt-4 mb-4 form ">
            <div class="p-2 pt-3" id="assignbox">
                <h4 class="text-info text-center mt-4">Assign NGO's</h4>

                <form method="POST">
                    <div class="form-group p-5">

                        <div class="row">

                            <div class="col-sm-2">
                                <label for="id">ID</label>
                                <input type="text" name="requestID" class="form-control mt-1 mb-2 text-center text-danger" value="<?php if (isset($_REQUEST['requestID'])) echo $_REQUEST['requestID']; ?>" readonly>
                            </div>

                            <div class="col-sm-10">
                                <label for="name">Individual Donor</label><br>
                                <input type="text" name="name" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['name'])) echo $row['name']; ?>">
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <label for="medicine">Medicine name</label><br>
                                <input type="text" name="medicine" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['medicine'])) echo $row['medicine']; ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="type">Quantity</label><br>
                                <input type="text" name="quantity" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['quantity'])) echo $row['quantity']; ?>">
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <label for="address">Address</label><br>
                                <input type="text" name="area" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['area'])) echo $row['area']; ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="upzilla">Thana/Upazila</label><br>
                                <input type="text" name="upzilla" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['upzilla'])) echo $row['upzilla']; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="type">District</label><br>
                                <input type="text" name="district" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['district'])) echo $row['district']; ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="ngo">Select NGO</label>
                                <select class="form-control" name="ngo" required>
                                    <option value="">Choose NGO</option>
                                    <?php
                                    $sql = "SELECT ngo_district, ngo_name FROM ngologin_tb order by ngo_district asc";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                    ?> <option value="<?php echo $row['ngo_name']; ?>">
                                                <?php
                                                echo $row['ngo_district'];
                                                echo "<p> - </p>";
                                                echo $row['ngo_name'];
                                                ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <label for="phone">Phone</label><br>
                                <input type="text" name="phone" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['phone'])) echo $_REQUEST['phone']; ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control mt-1 mb-2">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 ">
                                <button class="btn btn-info " type="submit" name="assign">Assign Request</button>

                            </div>

                            <div class="col-sm-6">
                                <a href="individual.php" class="btn btn-warning "><i class="fas fa-sync pr-2"></i>Refresh</a>
                            </div>
                            <?php
                            if (isset($msg)) {

                                echo $msg;
                            }
                            ?>
                        </div>


                </form>

            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>