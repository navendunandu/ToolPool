<?php
include("../Assets/Connection/Connection.php"); 
session_start();

ob_start();
include("Header.php");
$viewqry="select * from tbl_user where user_id='".$_SESSION["userid"]."'";
$res=$conn->query($viewqry);
$profile=$res->fetch_assoc();
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtno"];
	$mail=$_POST["txtemail"];
	$address=$_POST["txtad"];
	$upqry="update tbl_user set user_name='".$name."',user_contact='".$contact."',user_email='".$mail."',user_address='".$address."'where user_id='".$_SESSION["userid"]."'";
	if($conn->query($upqry))
	{
		?><script>alert ('Data Updated')</script>";<?php
		header("Location:../User/Myprofile.php");
	}
}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<title>Untitled Document</title>
</head>
<body style="background-color: #eeeeee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
          <div class="card-body">
            <h1 align="center"><b><u>Edit Profile</u></b></h1>
            <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
              <table width="354" border="0" align="center" class="table">
                <tr>
                  <td width="60">Name</td>
                  <td width="287"><label for="txtname"></label>
                  <input type="text" name="txtname" id="txtname" value="<?php echo $profile["user_name"]?>" class="form-control" /></td>
                </tr>
                <tr>
                  <td>Contact</td>
                  <td><label for="txtno"></label>
                  <input type="text" name="txtno" id="txtno" value="<?php echo $profile["user_contact"]?>" class="form-control"/></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><label for="txtemail"></label>
                  <input type="email" name="txtemail" id="txtemail" value="<?php echo $profile["user_email"]?>" class="form-control"/></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td><label for="txtad"></label>
                  <textarea name="txtad" id="txtad" cols="30" rows="5" class="form-control"><?php echo $profile["user_address"]?></textarea></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" class="btn-primary" /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php ob_flush(); ?>
</body>
</html>