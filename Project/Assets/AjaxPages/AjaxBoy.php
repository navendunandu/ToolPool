<?php
include("../Connection/Connection.php");
$updqry="update tbl_booking set boy_id='".$_GET["boyid"]."', booking_status='4' where booking_id='".$_GET["bid"]."'";
    if($conn->query($updqry))
    {
       
    }
	?>
		