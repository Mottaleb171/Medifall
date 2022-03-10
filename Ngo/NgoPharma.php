<?php include('../dbconnect.php');

session_start();
if (isset($_SESSION['is_ngologin'])) {
    $ngoEmail = $_SESSION['ngoEmail'];
    // $ngoPassword = $_SESSION['ngoPassword'];
} else {
    echo "<script> location.href='NgoLogin.php'; </script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('../headerfooter/header.php'); ?>
    <title>Pharmaceutical Donation List</title>

    <link rel="stylesheet" type="text/css" href="../style.css">
    <style type="text/css">
        .table {
            width: 1290px;
            margin-left: auto;
            margin-right: auto;
        }

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
    <?php include('NgoNav.php'); ?>

    <?php
    $sql = "SELECT ngo_email,ngo_name,ngo_pass FROM ngologin_tb WHERE ngo_email='" . $ngoEmail . "' limit 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //	echo '<p>Individual Donoations:<b> '.$row['ngo_name'].'</b></p>';
            $n = $row['ngo_name'];
        }
    }
    ?>
    <h3 class="text-center text-secondary mt-5">Pharmaceutical Donoation Proposals:<b> <?php echo $n ?></b></h3>
    <div class="text-center"><a href="#scroll_down" class="btn btn-warning scroll_down"><i class="fas fa-sort-down"></i>Active Scroll Down</a>
    </div>
    <table class="table table-bordered table-striped mt-5">
        <thead class="text-light bg-success text-center">
            <tr>
                <th>ID</th>
                <th>Donor Name</th>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Upzilla</th>
                <th>District</th>
                <th>NGO</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">

            <?php
            $sql = "SELECT ngo_email,ngo_name,ngo_pass FROM ngologin_tb WHERE ngo_email='" . $ngoEmail . "' limit 1";
            $query = mysqli_query($conn, $sql);
            while ($rs = mysqli_fetch_assoc($query)) {
                $ngoname = $rs['ngo_name'];
            }

            $sql = "SELECT * FROM assign_pharma WHERE ngo='$ngoname'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // code...
                    echo '<tr><td>' . $row["donorID"] . '</td><td>';
                    echo $row["donor"] . '</td><td>';
                    echo $row["medicine"] . '</td><td>';
                    echo $row["quantity"] . '</td><td>';
                    echo $row["address"] . '</td><td>';
                    echo $row["upzilla"] . '</td><td>';
                    echo $row["district"] . '</td><td>';
                    echo $row["ngo"] . '</td><td>';
                    echo $row["phone"] . '</td><td>';
                    echo $row["date"] . '</td><td>';
                    echo $row["status"] . '</td><td>';



                    echo '<form method="POST" >';
                    echo '<input type="hidden" name="donorID" value=' . $row["donorID"] . '>';
                    echo '<input type="hidden" name="donor" value=' . $row["donor"] . '>';
                    echo '<input type="hidden" name="medicine" value=' . $row["medicine"] . '>';

                    echo '<input type="hidden" name="quantity" value=' . $row["quantity"] . '>';
                    echo '<input type="hidden" name="address" value=' . $row["address"] . '>';
                    echo '<input type="hidden" name="upzilla" value=' . $row["upzilla"] . '>';
                    echo '<input type="hidden" name="district" value=' . $row["district"] . '>';
                    echo '<input type="hidden" name="phone" value=' . $row["phone"] . '>';

                    echo '<input type="submit" name="view" class="btn btn-success" value="Assign"></td><td>';
                    echo '<input type="submit" name="close" class="btn btn-dark ml-2" value="Close" Onclick="return ConfirmDelete()"></input></td></tr>';
                    echo '</form>';
                }
            }
            ?>
        </tbody>
    </table>

    <?php


    if (isset($_REQUEST['view'])) //click view button then show details in assign form 
    {
        // code...
        $sql = "SELECT donorID,donor,medicine,quantity,address,upzilla,district,ngo,phone,date FROM assign_pharma WHERE donorID={$_REQUEST['donorID']}";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
    }

    //delete 
    if (isset($_REQUEST['close'])) {
        $sql = "DELETE FROM assign_pharma WHERE donorID = {$_REQUEST['donorID']}";
        if ($conn->query($sql) === TRUE) {
            // echo "Record Deleted Successfully";
            // below code will refresh the page after deleting the record
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }

    if (isset($_REQUEST['assign'])) {
        $sql = "SELECT donorID,donor,medicine,quantity,address,upzilla,district,ngo,phone,date FROM assign_pharma WHERE donorID={$_REQUEST['donorID']}";
        $id = $_REQUEST['donorID'];
        $donor = $_REQUEST['donor'];
        $medicine = $_REQUEST['medicine'];

        $quantity = $_REQUEST['quantity'];
        $address = $_REQUEST['address'];
        $upzilla = $_REQUEST['upzilla'];

        $district = $_REQUEST['district'];
        $executive = $_REQUEST['executive'];
        $phone = $_REQUEST['phone'];
        $date = $_REQUEST['date'];

        //insertion....
        $sql = "INSERT INTO executive_assign_pharma(donorID,donor,medicine,quantity,address,upzilla,district,executive,phone,daate) VALUES('$id','$donor','$medicine','$quantity','$address','$upzilla','$district','$executive','$phone','$date')";
        $result = $conn->query($sql);
        if ($result == true) {

    ?>

            <script>
                alert('Successfully Assigned To Executive');
            </script>
        <?php
        } else {
        ?>

            <script>
                alert('Failes to Assign');
            </script>
        <?php
        }
        ?>
        <?php
        $sql = "UPDATE assign_pharma SET status = 'Assigned To Executive' WHERE donorID={$_REQUEST['donorID']}";
        $res = $conn->query($sql);
        $sql = "UPDATE pharmadonation SET status = 'Assigned To Executive' WHERE pharmaID={$_REQUEST['donorID']}";
        $res = $conn->query($sql);
        ?>

        <script>
            window.location.href = 'NgoPharma.php';
        </script>

    <?php

    }
    ?>


    <!--form_-->
    <div id="scroll_down">
        <div class="container mt-4 mb-4 form ">
            <div class="p-2 pt-3" id="assignbox">
                <h4 class="text-success text-center mt-4">Assign Executive's</h4>

                <form method="POST">
                    <div class="form-group p-5">

                        <div class="row">

                            <div class="col-sm-2">
                                <label for="id">ID</label>
                                <input type="text" name="donorID" class="form-control mt-1 mb-2 text-center text-danger" value="<?php if (isset($_REQUEST['donorID'])) echo $_REQUEST['donorID']; ?>" readonly>
                            </div>

                            <div class="col-sm-10">
                                <label for="name">Individual Donor</label><br>
                                <input type="text" name="donor" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['donor'])) echo $row['donor']; ?>">

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
                                <input type="text" name="address" class="form-control mt-1 mb-2" value="<?php if (isset($_REQUEST['address'])) echo $row['address']; ?>">
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
                                <label for="executive">Select Executive</label>
                                <select class="form-control" name="executive" required>
                                    <option value="">Choose Executive Mail</option>
                                    <?php
                                    $sql = "SELECT  e_name, e_email FROM executivelogin_tb where ngo_name= '$ngoname'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                    ?> <option value="<?php echo $row['e_email']; ?>">
                                                <?php
                                                echo $row['e_name'];
                                                echo "<p> - </p>";
                                                echo $row['e_email'];
                                                ?></option>
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
                                <button class="btn btn-success " type="submit" name="assign">Assign Request</button>

                            </div>

                            <div class="col-sm-6">
                                <a href="NgoIndividual.php" class="btn btn-warning "><i class="fas fa-sync pr-2"></i>Refresh</a>
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
    </div>
    </div>

    <?php include('NgoFooter.php'); ?>
</body>

</html>