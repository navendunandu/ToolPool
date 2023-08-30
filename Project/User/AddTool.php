<?php
session_start();
include("../Assets/Connection/Connection.php");

ob_start();
include("Header.php");
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$subcategory=$_POST["selsubcat"];
	$type=$_POST["seltype"];
	$photo=$_FILES["txtphoto"]["name"];
	$temp=$_FILES["txtphoto"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/Tool/'.$photo);
	$details=$_POST["txtdetails"];
	$brand=$_POST["selbrand"];
	$price=$_POST["txtprice"];
	$insqry="insert into tbl_tool(tool_name, subcategory_id, company_id, type_id, tool_photo, tool_details, tool_rentprice, user_id)values('".$name."','".$subcategory."','".$brand."','".$type."','".$photo."','".$details."','".$price."','".$_SESSION['userid']."')";
	if($conn->query($insqry))
	{
		echo"<script>alert('TOOL ADDED')</script>";
	}
	else
	{
				echo"<script>alert('FAILED')</script>";
	}		
}
if(isset($_GET["id"]))
{
	$delqry="delete from tbl_tool where tool_id='".$_GET["id"]."'";
	if($conn->query($delqry))
	{
			?>
        <script>
		alert('Tool Deleted');
		location.href='AddTool.php';
		</script>
        <?php
	}
	else
	{
			?>
        <script>
		alert('Deletion Failed');
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<title>Add Tool</title>
<style type="text/css">
td{
	vertical-align:middle !important; 
	border-top: 0px !important;
}
body{
	background: linear-gradient(#8b8b8b7a,#6144054a),url(../Assets/Template/Add%20Tool/images/photo.jpg)
}
.card{
	background-color:#ffffffd4 !important;
}
</style>
</head>

<body bgcolor="#000000">
<div class="container" align="center" style="margin-top: 15px;">
<img src="../Assets/Template/Homepage-User/images/tp.png" height="150px"></div>
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
<h1 align="center">Add Tool</h1>
          <div class="card-body">
            <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
           <table width="354" border="0" align="center" class="table">
    <tr>
      <tr>
      <td width="60">Name</td>
      <td width="287"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" class="form-control"  required /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="selcat"></label>
        <select name="selcat" id="selcat" class="form-control form-control-sm" onChange="getSubcat(this.value)" >
        <option>---Select---</option>
        <?php
		$viewcat="select * from tbl_category";
		$re=$conn->query($viewcat);
		while($row=$re->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="selsubcat"></label>
        <select name="selsubcat" id="selsubcat"  class="form-control">
      </select></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><label for="seltype"></label>
        <select name="seltype" id="seltype"  class="form-control form-control-sm">
        <option>---Select---</option>
        <?php
		$viewtype="select * from tbl_type";
		$re=$conn->query($viewtype);
		while($row=$re->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['type_id'];?>"><?php echo $row['type_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="txtphoto"></label>
      <input type="file" name="txtphoto" id="txtphoto" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails"  class="form-control"cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Brand</td>
      <td><label for="selbrand"></label>
        <select name="selbrand" id="selbrand"  class="form-control form-control-sm">
        <option>---Select---</option>
        <?php
		$viewcompany="select * from tbl_company";
		$re=$conn->query($viewcompany);
		while($row=$re->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input type="text" name="txtprice" id="txtprice" class="form-control"/>
      Per Day</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><label for="txtprice">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn-success" />
      </label></td>
    </tr>
  </table><br />

  <?php
	$selqry="select * from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where user_id='".$_SESSION['userid']."'";
	$result=$conn->query($selqry);
	if($result->num_rows>0)
	{
		$i=0;
	?>
  <table align="center" class="table">
    <tr>
    <td width="50">Sl.No</td>
      <td width="165">Name</td>
      <td width="165">Brand</td>
      <td width="165">Category</td>
      <td width="165">Subcategory</td>
      <td width="165">Type</td>
      <td width="165">Details</td>
      <td width="90">Price</td>
      <td width="53">Action</td>
    </tr><?php
    while($row=$result->fetch_assoc())
	  {
		  $i++; ?> 
    <tr>
	<td><?php echo $i;?></td>
      <td><?php echo $row["tool_name"];?> </td>
      <td><?php echo $row["company_name"];?></td>
      <td><?php echo $row["category_name"];?></td>
      <td><?php echo $row["subcategory_name"];?></td>
      <td><?php echo $row["type_name"];?></td>
      <td><?php echo $row["tool_details"];?></td>
      <td><?php echo $row["tool_rentprice"];?></td>
      <td><a href="AddTool.php?id=<?php echo $row["tool_id"];?>">Delete</a>&nbsp;<a href="UserStock.php?sid=<?php echo $row["tool_id"];?>">Stock</a></td>
    </tr>
    <?php } ?>
  </table>
  <?php
	}
	else
	{
		echo"<h1 align='center'>NO DATA FOUND</h1>";
	}
  ob_flush();
	?>
</form>
</body>
<script src="../Assets/JQ/JQuery.js"></script>
<script>
	function getSubcat(did)
	{
		$.ajax({url:"../Assets/AjaxSubCat/AjaxSubCat.php?did="+did,
		success: function(result){
			$("#selsubcat").html(result);
		}});
	}
	</script> 
</html>