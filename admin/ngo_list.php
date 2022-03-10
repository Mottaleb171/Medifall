<?php include('../dbconnect.php');
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
    <?php include('../headerfooter/header.php'); ?>
    <title>NGOs List</title>

    <link rel="stylesheet" type="text/css" href="../style.css">
    <style type="text/css">
        .table {
            width: 1290px;
            margin-left: auto;
            margin-right: auto;
        }

        .scroll_down {
            margin-left: auto;
            margin-right: auto;

        }

        .empty_space {
            height: 260px;
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
    <h3 class="text-center text-secondary mt-5">NGOs List</h3>
    <div class="text-center"><a href="#scroll_down" class="btn btn-warning scroll_down"><i class="fas fa-sort-down"></i>Active Scroll Down</a>
    </div>
    <table class="table table-bordered table-striped mt-5">
        <thead class="text-light bg-info text-center">
            <tr>
                <th>NGO's Name</th>
                <th>District</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">

            <?php
            $sql = "SELECT * FROM ngologin_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><td>' . $row["ngo_name"] . '</td><td>';
                    echo $row["ngo_district"] . '</td><td>';
                    echo $row["ngo_email"] . '</td><td>';

                    echo '<form method="POST" >';
                    echo '<input type="hidden" name="ngo_name" value=' . $row["ngo_name"] . '>';

                    echo '<input type="submit" name="close" class="btn btn-dark ml-2" value="Delete" Onclick="return ConfirmDelete()"></input></td></tr>';
                    echo '</form>';
                }
            }
            ?>
        </tbody>
    </table>
    <div class="empty_space">
    </div>
    <?php
    if (isset($_REQUEST['close'])) {
        $sql = "DELETE FROM ngologin_tb WHERE ngo_name = {$_REQUEST['ngo_name']}";
        if ($conn->query($sql) === TRUE) {
            // echo "Record Deleted Successfully";
            // below code will refresh the page after deleting the record
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>