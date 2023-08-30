<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtno"];
	$mail=$_POST["txtemail"];
	$gender=$_POST["radgen"];
	$address=$_POST["txtad"];
	$district=$_POST["selplace"];
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/DeliveryBoy/'.$photo);
	$proof=$_FILES["photoproof"]["name"];
	$temp=$_FILES["photoproof"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/DeliveryBoy/'.$proof);
	$pw=$_POST["txtpw"];
	$cpw=$_POST["txtcpw"];
	$insqry="insert into tbl_deliveryboy(boy_name, boy_contact, boy_email, boy_gender, boy_address,  place_id, boy_password,boy_photo, boy_proof, boy_doj) values('".$name."','".$contact."','".$mail."','".$gender."','".$address."','".$district."','".$pw."','".$photo."','".$proof."',curdate())";
	if($pw==$cpw)
	{
	if($conn->query($insqry))
	{
		echo "<script>alert ('Registration Successful')</script>";
	}
	else
	{
		echo "<script>alert ('Registration UnSuccessful')</script>";
	}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<title>Delivery Boy Registration</title>
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
<img src="../Assets/images/tp.png" height="150px"></div>
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
          <div class="card-body">
          <table width="475" border="0" class="table">
  <tr>
    <th scope="row" style="vertical-align: middle; border-top: none;"><h1>Delivery Boy Registration</h1></th>
    <td align="right"><a href="Shop.php">Click here for Shop Registration -></a></td>
    <td align="right"><a href="User.php">Click here for User Registration -></a></td>
  </tr>
</table>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <table width="354" border="0" align="center" class="table">
    <tr>
      <td width="60">Name</td>
      <td width="287"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" class="form-control" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtno"></label>
      <input type="text" name="txtno" id="txtno" pattern="([0-9]{10,10})" class="form-control" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" class="form-control" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radgen" id="radgen2" value="Male" required autocomplete="off"/>
      Male 
      <label for="radgen"></label>
      <input type="radio" name="radgen" id="radgen3" value="Female" required autocomplete="off"/>
      Female
<label for="radgen2">
  <input type="radio" name="radgen" id="radgen" value="Others" required autocomplete="off"/>
  Others</label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtad"></label>
      <textarea name="txtad" id="txtad" cols="30" rows="5" class="form-control"  required autocomplete="off"></textarea></td>
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
      <td>Photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo"  required/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="photoproof"></label>
      <input type="file" name="photoproof" id="photoproof"  required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpw"></label>
      <input type="password" name="txtpw" id="txtpw" class="form-control"  required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txtcpw"></label>
      <input type="password" name="txtcpw" id="txtcpw" class="form-control" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" class="btn-success" /></td>
    </tr>
  </table>
</form>
</div></div></div></div></div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
 <script>
 	function getPlace(did)
	{
		$.ajax({url:"../Assets/AjaxPages/Ajaxplace.php?did="+did,
		success:function(result){
			$("#selplace").html(result);
		}});
	}
</script>
</html>