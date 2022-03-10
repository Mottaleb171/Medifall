<?php 
include('dbconnect.php');

if(isset($_REQUEST['submit']))
{

   $name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
   $phone = $_REQUEST['phone'];
	$message = $_REQUEST['message'];

        $sql="INSERT into  contact_tb(contact_id,contact_name,	contact_email, contact_phone,	contact_message) values('','$name','$email','$phone','$message')";
        if($conn->query($sql)==true)
        {
             $msg='<div class="alert alert-success mt-3 text-center">Message Sent!</div>';
        }

        else
        {
             $msg='<div class="alert alert-warning mt-3 text-center">Fail to Contact</div>';
        } 
}

?>
<div id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="titlepage">
                    <h2>Contact <span class="white">Us</span></h2>
                </div>
                <div class="cont">
                    <span>For Any Query, <br> Please Feel Free <br> to Contact Us</span>
                </div>
            </div>
            <div class="col-md-6">
                <form class="main_form" method="POST" action="">
                    <div class="row">
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="ID" type="hidden" name="id">
                        </div>
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="Full Name" type="text" name="name">
                        </div>
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="Email" type="text" name=" email">
                        </div>
                        <div class="col-sm-12">
                            <input class="contactus" placeholder="Phone" type="text" name="phone">
                        </div>
                        <div class="col-sm-12">
                            <textarea class="textarea" placeholder="Message" type="text" name="message"></textarea>
                        </div>
                        <button type="submit" name="submit"
                            class=" btn btn-outline-info form-control mt-3">Send</button>
                        <?php if(isset($msg))
				{
					echo $msg;
				} ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>