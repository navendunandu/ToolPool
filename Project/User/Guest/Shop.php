<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$mail=$_POST["txtmail"];
	$contact=$_POST["txtcontact"];
	$address=$_POST["txtaddress"];
	$dist=$_POST["seldist"];
	$place=$_POST["selplace"];
	$logo=$_FILES["photologo"]["name"];
	$templogo=$_FILES["photologo"]["tmp_name"];
	move_uploaded_file($templogo,'../Assets/File/Shop/'.$logo);
	$proof=$_FILES["photoproof"]["name"];
	$tempproof=$_FILES["photoproof"]["tmp_name"];
	move_uploaded_file($tempproof,'../Assets/File/Shop/'.$proof);
	$pass=$_POST["txtpassword"]; 
	$cpassword=$_POST["txtcpassword"];
	$insqry="insert into tbl_toolshop (toolshop_name,toolshop_contact,toolshop_email,toolshop_address,place_id,toolshop_logo,toolshop_proof,toolshop_password,toolshop_doj) values('".$name."','".$contact."','".$mail."','".$address."','".$place."','".$logo."','".$proof."','".$pass."',curdate())";	
	if($pass==$cpassword)
	{
		
	if($conn->query($insqry))
	{
		echo "<script>alert ('Registration Successful')</script>";
	}
	else
	{
		echo "<script>alert ('Registration Failed')</script>";
	}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<title>Shop Registration</title>
<style type="text/css">
td{
	vertical-align:middle !important; 
	border-top: 0px !important;
}
body{
	background: linear-gradient(#8b8b8b7a,#6144054a),url(../Assets/Template/Login/Images/bg-01.jpg);
}
.card{
	background-color:#ffffffd4 !important;
}
</style>
</head>

<body bgcolor="#000000">
<div class="container" align="center" style="margin-top: 15px;">
<a href="ToolPool-Login.php"><img src="../Assets/images/tp.png" height="150px"></a>
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
          <div class="card-body">
          <table width="475" border="0" class="table">
  <tr>
    <th scope="row" style="vertical-align: middle; border-top: none;"><h1>Shop Registration</h1></th>
    <td align="right"><a href="User.php">Click here for User Registration -></a></td>
    <td align="right"><a href="boyreg.php">Click here for Delivery Boy Registration -></a></td>
  </tr>
</table>

<form id="form1" enctype="multipart/form-data" name="form1" method="post" action="">
  <table width="434" border="0" align="center" class="table">
    <tr>
      <td width="106">Shop Name</td>
      <td width="312"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"class="form-control" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtmail"></label>
      <input type="text" name="txtmail" id="txtmail"class="form-control" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Contact No:</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" class="form-control"required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5"class="form-control" required autocomplete="off" ></textarea > </td>
    </tr>
    <tr>
      <td>District</td>
      <td><select name="seldist" id="seldist" onchange="getPlace(this.value)" class="form-control form-control-sm" required>
        <option>---Select---</option>
        <?php
		$selqry="select * from tbl_district";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?>     
            </option>
            <?php
		} 
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="selplace"></label>
       <select name="selplace" id="selplace" class="form-control form-control-sm" required>
        <option>---Select---</option>
      </select></td>
    </tr>
    <tr>
      <td>Shop Logo</td>
      <td><input type="file" name="photologo" id="photologo"  required/></td>
    </tr>
    <tr>
      <td>Shop Proof</td>
      <td><input type="file" name="photoproof" id="photoproof"  required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" class="form-control" required autocomplete="off" /></td>
    </tr>
    <tr>
    <td>Confirm Password</td>
      <td><label for="txtcpassword"></label>
      <input type="password" name="txtcpassword" id="txtcpassword" class="form-control" required autocomplete="off" /></td>
    </tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn-success" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
<script src="../Assets/JQ/JQuery.js"></script>
<script>
	function getPlace(did)
	{
		$.ajax({url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(result){
			$("#selplace").html(result);
		}});
	}
	</script>
</html>