<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include("Header.php");
if(isset($_POST["btnadd"]))
{
	$toolid=$_POST["txtsid"];
	$date=$_POST["txtdate"];
	$quantity=$_POST["txtquantity"];
	$insqry="insert into tbl_stock (stock_quantity,tool_id,stock_date) values('".$quantity."','".$toolid."','".$date."')";	
	if($re=$conn->query($insqry))
	{
		echo "<script> alert('Stock Updated');</script>";
		header("Location:../User/UserStock.php?sid=".$toolid);
	}
	else
	{
		echo "<script>alert('Stock Update Failed');</script>";
	}
} 
if(isset($_GET["did"]))
{
	$delqry="delete from tbl_stock where tool_id='".$_GET['did']."'";
	echo $delqry;
	if($re=$conn->query($delqry))
	{
		echo "<script> alert('Stock deleted');</script>";
		header("Location:../User/UserStock.php?sid=".$toolid);
	}
	else
	{
		echo "<script>alert('Stock deletion Failed');</script>";
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
            <h1 align="center"><b>Stock</b></h1>
<form id="form1" name="form1" method="post" action="">	
  <table width="200" class="table" align="center">
  <input type="hidden" value="<?php echo $_GET['sid'];?>" name="txtsid" id="txtsid" class="form-control"/>
    <tr>
      <td>Date</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate" class="form-control" /></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><input type="number" name="txtquantity" id="txtquantity" class="form-control"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Submit"   class="btn-success"/></td>
    </tr>
  </table>
  <?php
  $viewqry="select * from tbl_stock where tool_id='".$_GET['sid']."'";
  $result=$conn->query($viewqry);
	if($result->num_rows>0)
	{
		$i=0;
	?> 
  <table width="200" class="table" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Date</td>
      <td>Quantity</td>
      <td>Action</td>
    </tr>
     <?php
    while($row=$result->fetch_assoc())
	  {
		  $i++; ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $row["stock_date"];?></td>
      <td><?php echo $row["stock_quantity"];?></td>
      <td><a href="UserStock.php?did=<?php echo $row["stock_id"];?>&amp;did=<?php echo $_GET["sid"]?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
  <?php
	}
	else
	{
		echo "<h1 align='center'>No Data Found</h1>";
	} ?>
</form>
<?php ob_flush(); ?>
</body>
</html>