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
// echo $_GET['id'];
$sql="SELECT donorID,donor,medicine,quantity,`address`,upzilla,district,executive,phone,daate,`status` FROM executive_assign_indi WHERE donorID={$_REQUEST['id']}";
    $res=$conn->query($sql);
    //$row=$res->fetch_assoc();

 ?>  
 <!DOCTYPE html>
 <html>
    
<head>
    <?php include('../headerfooter/header.php'); ?>
    <title>Print Donation Copy</title>

    <link rel="stylesheet" type="text/css" href="../style.css">
    <style type="text/css">
    .table {
        width: 1500px;
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
    body {
            text-align: center;
        }

        table, th, td {
  border: 1px solid black;
        }
    </style>
    <script>
      function print_donation(){ 
            var tab = document.getElementById('donation');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(donation.outerHTML);
            win.document.close();
            win.print();
        }
    
</script>
  </head>
     <body>
    <table id="donation" class="table table-bordered table-striped mt-5">
        <thead class="text-light bg-success text-center">
            <tr>
                <th>ID</th>
                <th>Donor Name</th>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Upzilla</th>
                <th>District</th>
                <th>Executive</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <br></br>
            <?php
        if($res->num_rows>0){
				while ($row=$res->fetch_assoc()) {
					// code...
					echo '<tr><td>'.$row["donorID"].'</td><td>';
					echo $row["donor"].'</td><td>';
					echo $row["medicine"].'</td><td>';
					echo $row["quantity"].'</td><td>';
                    echo $row["address"].'</td><td>';
					echo $row["upzilla"].'</td><td>';
					echo $row["district"].'</td><td>';
					echo $row["executive"].'</td><td>';
					echo $row["phone"].'</td><td>';
					echo $row["daate"].'</td><td>';
                    echo $row["status"].'</td><td>';

                    
                }
            }
                    ?>
                    </tbody>
    </table>
           
    <?php echo '<input type="button" name="print" onclick="print_donation()" class="btn btn-success" value="Print"></td></tr>';
    ?>

    </body>
</html>