<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
		$name=$_POST["txtname"];
		$mail=$_POST["txtmail"];
		$password=$_POST["txtpassword"];
		$insqry="insert into tbl_admin(admin_name, admin_email, admin_password) values('".$name."','".$mail."','".$password."')";
		if($conn->query($insqry))
		{
			?><script>
			alert('Admin Added');
			location.href='ToolPool-Login.php';
		</script><?php
		}
		else
		{
			echo "<script>alert ('Registration Failed')</script>";
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="241" border="1" align="center">
    <tr>
      <td width="92">Name</td>
      <td width="139"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><label for="txtmail"></label>
      <input type="text" name="txtmail" id="txtmail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>