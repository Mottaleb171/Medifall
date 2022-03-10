<?php include('../dbconnect.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
 $aEmail = $_SESSION['aEmail'];
} else {
 echo "<script> location.href='login.php'; </script>";
}
?>
<h3 class="text-info mt-4">Pharmaceutical Donation Assign
    <hr>
</h3>
<div class="row ">


    <?php 
					$sql="SELECT * FROM pharmadonation";
					$result=$conn->query($sql);
					if($result->num_rows>0)
					{
						while ($row=$result->fetch_assoc()) {
							// code...
							echo '<div class="col-sm-4">';
							echo '<div class="card ">';
						echo '<div class="card-header bg-info text-light">';
						echo 'Donor ID: '.$row['pharmaID'];
						echo '</div>';
						
						echo '<div class="card-body justify-center">';
						echo '<h5 class="card-title text-info">Medicine: '.$row['medicine'].'</h5>';
						
						echo '<p>Qunatity: '.$row['quantity']. '</p>';

						echo '<p><b>District: </b>'.$row['district']. "."." ".'<b>Date: </b>'.$row['daate']. '</p>';
						echo '</div>';

						echo '<div class="card-footer">';

						//details from view card;/////
					
						//data send form file

						echo '<form method="POST" >';
						echo '<input type="hidden" name="id" value='.$row["pharmaID"].'>';
						echo '<input type="hidden" name="donor" value='.$row["pharmaName"].'>';
						echo '<input type="hidden" name="medicine" value='.$row["medicine"].'>';

						echo '<input type="hidden" name="quantity" value='.$row["quantity"].'>';
						echo '<input type="hidden" name="address" value='.$row["area"].'>';
						echo '<input type="hidden" name="upzilla" value='.$row["upzilla"].'>';
						echo '<input type="hidden" name="district" value='.$row["district"].'>';
						echo '<input type="hidden" name="phone" value='.$row["phone"].'>';

						
						echo '<input type="submit" name="view" class="btn btn-danger mt-1" value="View" id="viewbtn"></input>';
						echo '<input type="submit" name="close" class="btn btn-dark ml-2 mt-2" value="Close" id="closebtn"></input>';
						echo '</form>';
						echo '</div>';
					echo '</div>';

					//end sending process
												
						/*echo '</div>';
					echo '</div>';*/
					echo '</div>';
						}

					}
					?>
</div>
</div>

<!--click view button then show details in assign form -->
<?php 
				if (isset($_REQUEST['view'])) 
				{
					
					$sql="SELECT * FROM pharmadonation where id={$_REQUEST['id']}";
					$res=$conn->query($sql);
				
				}
				?>
<!--button process end -->