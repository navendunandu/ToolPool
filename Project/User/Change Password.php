<?php
include("../Assets/Connection/Connection.php"); 

ob_start();
include("Header.php");
session_start();
if(isset($_POST["btnchange"]))
{
	$newpw=$_POST["txtnewpw"];
	$repw=$_POST["txtrepw"];
	$oldpw=$_POST["txtoldpw"];
	$selqry="select * from tbl_user where user_id='".$_SESSION["userid"]."'";
	$ress=$conn->query($selqry);
	$row=$ress->fetch_assoc();
	if($newpw==$repw && $oldpw==$row["user_password"])
	{
		$pwqry="update tbl_user set user_password='".$newpw."' where user_id='".$_SESSION["userid"]."'";
		if($conn->query($pwqry))
		{
			?><script>alert ('Password Changed')
            location.href='Myprofile.php';</script>";<?php
		}
	}
	else
	{
		?><script>alert ("Password Doesn't Match")</script><?php
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
<h1 align="center"><b><u>Change Password</u></b></h1>

<form id="form1" name="form1" method="post" action="">
  <table width="325" border="0" align="center" class="table">
  <tr>
      <td width="190">Old Password</td>
      <td width="125"><label for="txtoldpw"></label>
      <input type="password" name="txtoldpw" id="txtoldpw" required class="form-control"/></td>
    </tr>
    <tr>
      <td width="190">New Password</td>
      <td width="125"><label for="txtnewpw"></label>
      <input type="password" name="txtnewpw" id="txtnewpw" required class="form-control"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txtrepw"></label>
      <input type="password" name="txtrepw" id="txtrepw" required class="form-control"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnchange" id="btnchange" value="Change Password" class="btn-success"/></td>
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