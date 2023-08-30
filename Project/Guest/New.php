<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	 $name=$_POST["txtname"];
	 $contact=$_POST["txtcontact"];
	 $email=$_POST["txtmail"];
	 $address=$_POST["txtaddress"];
	 $district=$_POST["txtdist"];
	 $place=$_POST["txtplace"];
	 $password =$_POST["txtpass"];
	 $proof=$_FILES["pic2"]["name"];
	 $photo=$_FILES["pic1"]["name"];
	 $tempphoto=$_FILES["pic1"]["tmp_name"];
	 $tempproof=$_FILES["pic2"]["tmp_name"];
	 move_uploaded_file($tempproof,'../Assets/File/vendor/'.$proof);
	 move_uploaded_file($tempphoto,'../Assets/File/vendor/'.$photo);
	  $insqry="insert into tbl_vendor_registration(v_name,v_contact,v_email,v_address,v_district,v_place,v_password,v_proof,v_photo) values('".$name."','".$contact."','".$email."','".$address."','".$district."','".$place."','".$password."','".$proof."','".$photo."')";
	  echo $insqry;
  if($conn->query($insqry))
  {
	 ?>
     <script>
	 alert('Data Inserted');
	 Location.href='Toolpool-Login.php';
	 </script>
     <?php
  }
  else
  	{
	 ?>
     <script>
	 alert('Data Not Inserted');
	 </script>
     <?php
    }
 }
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
 	function getplace(did)
	{
		$.ajax({url:"../Assets/AjaxPages/Ajaxplace.php?did="+did,
		success:function(result){
			$("#txtplace").html(result);
		}});
	}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New User</title>
<link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
<style type="text/css">
#form1 table tr td {
	font-weight: bold;
}
</style>
</head>
<body>
<form id="form1" enctype="multipart/form-data" name="form1" method="post" action="">
  <table width="545" border="1" align="center">
    <tr>
      <td width="80">Name</td>
      <td width="336"><label for="txtname"></label>
      <input type="txtname" name="txtname" id="txtname" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="txtcontact" name="txtcontact" id="txtcontact" pattern="([0-9]{10,10})"  required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtmail"></label>
      <input type="txt" name="txtmail" id="txtmail" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress">
        <textarea name="txtaddress" id="txtaddress" cols="45" rows="5"  required autocomplete="off"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Photo</td>
       <td><input type="file" name="pic1" id="pic1"></td>
    <tr>
      <td><p>Proof</p></td>
       <td><input type="file" name="pic2" id="pic2"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpass"></label>
      <input type="text" name="txtpass" id="txtpass" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txtdist"></label>
      <select name="txtdist" id="txtdist" onChange="getplace(this.value)" required  >
      <option value="">------select-----</option>
     
     <?php
     	$selqry="select * from tbl_district";
	  $re=$conn->query($selqry);
	  while($row=$re->fetch_assoc())
	 {
		 ?>
       <option value="<?php echo $row["district_id"];?>">
       					<?php echo $row ["district_name"];?></option> 
                      <?php                 					
	}
	 ?> 
      </select>
     </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txtplace"></label>
         <select name="txtplace" id="txtplace" required  >
      <option value="">------select-----</option>    
      </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>