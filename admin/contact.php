<!DOCTYPE html>
<html>
<head>
   <style type="text/css">
	.empty_space{
	height:150px;
}
   </style>
</head>
<body>
<?php 
include('../dbconnect.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 include('../headerfooter/header.php');
 include('includes/nav.php');
?>
<title>Medifall: Messages</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="custom.css">
<!--Contact Start-->
<div class="contacts mt-4 mb-5 container text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">Contacts</p>
    <?php
    $sql = "SELECT * FROM contact_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  echo '<table class="table">
    <thead>
      <tr>
        <th scope="col">Contact ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Message</th>
      </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
      echo '<tr>
        <th scope="row">'.$row["contact_id"].'</th>
        <td>'.$row["contact_name"].'</td>
        <td>'.$row["contact_email"].'</td>
        <td>'.$row["contact_phone"].'</td>
        <td style="border:1px dotted black">'.$row["contact_message"].'</td>
        <td>
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["contact_id"] .'>
		  <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
        </td>
      </tr>';
    }
    echo '</tbody>
  </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM contact_tb WHERE contact_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>

</div>
	<div class="empty_space">
	 </div>
<?php include('includes/footer.php'); ?>
</body>
</html>
<!--Contact end-->