<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<title>Untitled Document</title>
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
    <?php
  $viewqry="select DISTINCT user_id, user_photo, user_name from tbl_schat c INNER JOIN tbl_user u on c.schat_fromuid=u.user_id where schat_tosid='".$_SESSION['shopid']."'";
  
  $result=$conn->query($viewqry);
	if($result->num_rows>0)
	{
		$i=0;
	?> 
    <table width="200" border="1">
        <tr>
        <td>Sl.No</td>
        <td>Photo</td>
        <td>Sender</td>
        <td>Action</td>
        </tr>
        <?php
    while($row=$result->fetch_assoc())
	  {
		  $i++; ?>
          <tr>
        <td><?php echo $i;?></td>
        <td><img src="../Assets/File/User/<?php echo $row["user_photo"];?>" height="100px"></td>
        <td><?php echo $row["user_name"];?></td>
        <td><a href="SChat.php?id=<?php echo $row['user_id']?>">Chat</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php
	}
	else
	{
		echo "<h1 align='center'>No Chats Found</h1>";
	} ?>
    </form>
    <?php
ob_flush();
?>
</body>
</html>
