<?php include('../dbconnect.php');
session_start();

if (isset($_SESSION['is_ngologin'])) {
    $ngoEmail = $_SESSION['ngoEmail'];
} else {
    echo "<script> location.href='NgoLogin.php'; </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../headerfooter/header.php'); ?>
    <title>Individual Users List</title>

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
    <?php include('NgoNav.php'); ?>
    <h3 class="text-center text-secondary mt-5">Executives List</h3>
    <div class="text-center"><a href="#scroll_down" class="btn btn-warning scroll_down"><i class="fas fa-sort-down"></i>Active Scroll Down</a>
    </div>
    <table class="table table-bordered table-striped mt-5">
        <thead class="text-light bg-info text-center">
            <tr>
                <th>Executive ID</th>
                <th> Name</th>
                <th>Email</th>
                <th>NGO</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <!-- select ngo first by email logged in-->
            <?php
            $sql = "SELECT * FROM ngologin_tb WHERE ngo_email='" . $ngoEmail . "' limit 1";
            $query = mysqli_query($conn, $sql);
            while ($rs = mysqli_fetch_assoc($query)) {
                $ngoname = $rs['ngo_name'];
            }
            ?>
            <!-- fetch executive data  -->
            <?php
            $sql = "SELECT * FROM executivelogin_tb where ngo_name= '$ngoname' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><td>' . $row["e_id"] . '</td><td>';
                    echo $row["e_name"] . '</td><td>';
                    echo $row["e_email"] . '</td><td>';
                    echo $row["ngo_name"] . '</td><td>';

                    echo '<form method="POST" >';
                    echo '<input type="hidden" name="id" value=' . $row["e_id"] . '>';

                    echo '<input type="submit" name="close" class="btn btn-dark ml-2" value="Remove" Onclick="return ConfirmDelete()"></input></td></tr>';
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
        $sql = "DELETE FROM executivelogin_tb WHERE e_id = {$_REQUEST['id']}";
        if ($conn->query($sql) === TRUE) {
            echo "Executive Removed Successfully";
            // below code will refresh the page after deleting the record
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo "Unable to Remove the Executive";
        }
    }
    ?>
    <?php include('NgoFooter.php'); ?>
</body>

</html>