<?php
session_start();
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");
$selqry="SELECT * FROM tbl_complaint c inner join tbl_booking b on b.booking_id=c.booking_id INNER join tbl_cart cr on cr.booking_id=b.booking_id INNER JOIN tbl_tool tl on tl.tool_id=cr.tool_id INNER JOIN tbl_toolshop t on t.toolshop_id=tl.toolshop_id  INNER JOIN tbl_complainttype y on y.complainttype_id=c.complainttype_id where c.user_id='".$_SESSION["userid"]."'";
$selqryu="SELECT * FROM tbl_complaint c inner join tbl_booking b on b.booking_id=c.booking_id INNER join tbl_cart cr on cr.booking_id=b.booking_id INNER JOIN tbl_tool tl on tl.tool_id=cr.tool_id INNER JOIN tbl_user u on u.user_id=tl.user_id INNER JOIN tbl_complainttype y on y.complainttype_id=c.complainttype_id; where c.user_id='".$_SESSION["userid"]."'";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<title>Posted Complaints</title>
</head>

<body>
<?php
$result=$conn->query($selqry); 
$resultu=$conn->query($selqryu);
	if(($result !== false && $result->num_rows>0) || ($resultu !== false && $resultu->num_rows>0))
	{ 
	?>
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
          <div class="card-body">
<form id="form1" name="form1" method="post" action="">
  <table width="200"  class="table">
    <tr>
      <td>SlNo</td>
      <td>Complaint Title</td>
      <td>Complaint Type</td>
      <td>Complaint Content</td>
      <td>ShopName</td>
      <td>Reply</td>
    </tr>
    <?php
	$i=0;
		while($row=$result->fetch_assoc())
		{
			$i++;
			?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row["complaint_title"];?></td>
            <td><?php echo $row["complainttype_name"];?></td>
            <td><?php echo $row["complaint_content"];?></td>
            <td><?php echo $row["toolshop_name"];?></td>
            <td><?php echo $row["complaint_reply"];?></td>
            <?php	
		}
    while($resultu!== false && $rowu=$resultu->fetch_assoc())
		{
			$i++;
			?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $rowu["complaint_title"];?></td>
            <td><?php echo $rowu["complainttype_name"];?></td>
            <td><?php echo $rowu["complaint_content"];?></td>
            <td><?php echo $rowu["user_name"];?></td>
            <td><?php echo $rowu["complaint_reply"];?></td>
            <?php	
		}
		?>
    </table>
    </form>
  </div>
 </div>
  </div>
  </div>
  </div>
        </div>
      </div>
 <?php
	}
   else
   {
	   echo "<h1 align='Center'><strong>No Data Found</strong></h1>";
   }
   ob_flush();
   ?>
</body>
</html>