<?php
include("../Assets/Connection/Connection.php"); 
session_start();
ob_start();
include("Header.php");
$viewqry="select * from tbl_toolshop where toolshop_id='".$_SESSION["shopid"]."'";
$res=$conn->query($viewqry);
$profile=$res->fetch_assoc();
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtno"];
	$mail=$_POST["txtemail"];
	$address=$_POST["txtad"];
	$upqry="update tbl_toolshop set shop_name='".$name."', shop_num='".$contact."', shop_email='".$mail."', shop_address='".$address."' where toolshop_id='".$_SESSION["shopid"]."'";
	if($conn->query($upqry))
	{
		?><script>alert ('Data Updated')</script>";<?php
		header("Location:../shop/Myprofile.php");
	}
}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
<title>Edit Profile</title>
</head>
<body style="background-color: #eeeeee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="align-content: flex-start;">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
          <div class="card-body">
<h1 align="center"><b><u>Edit Profile</u></b></h1>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <table width="354" class="table" align="center">
    <tr>
      <td width="60">Name</td>
      <td width="287"><label for="txtname"></label>
      <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $profile["toolshop_name"]?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtno"></label>
      <input type="text" class="form-control" name="txtno" id="txtno" value="<?php echo $profile["toolshop_contact"]?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" class="form-control" name="txtemail" id="txtemail" value="<?php echo $profile["toolshop_email"]?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtad"></label>
      <textarea name="txtad" class="form-control" id="txtad" cols="30" rows="5"><?php echo $profile["toolshop_address"]?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="btnsave" id="btnsave" value="Save" /></td>
    </tr>
  </table>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
ob_flush();
?>
</body>
</html>