<?php 
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");

if(isset($_POST["btnsubmit"]))
{
	$ctype=$_POST["ddltype"];
	$ctitle=$_POST["txttitle"];
	$content=$_POST["txtcontent"];
	
	$insqry="insert into tbl_complaint(complaint_title,complaint_content,user_id,booking_id,complainttype_id)values('".$ctitle."','".$content."','".$_SESSION['userid']."','".$_GET['bid']."','".$ctype."')";
	echo $insqry;
	if($conn->query($insqry))
	  {
		 ?>
		 <script>
		 alert('Complaint Registred');
		 </script>
		 <?php
		 header("Location:../User/MyOrder.php");
	  }
	  else
		{
		 ?>
		 <script>
		 alert('Complaint Not Registred');
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
<title>Untitled Document</title>
</head>
<body style="background-color: #eeeeee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <div class="card" style="border-radius: 15px; margin:20px 20px;">
          <div class="card-body">
            <h1 align="center"><b><u>Post Complaint</u></b></h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200"   class="table">
    <tr>
      <td>Complaint Type</td>
      <td><label for="ddltype"></label>
        <select name="ddltype" id="ddltype" class="form-control form-control-sm">
        <option>---Select---</option>
        <?php
		$selqry="select * from tbl_complainttype";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["complainttype_id"]; ?>"><?php echo $row["complainttype_name"]; ?></option>
            <?php
		} 
		?>
      </select></td>
    </tr>
    <tr>
      <td>Complaint Title</td>
      <td><label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle" class="form-control" /></td>
    </tr>
    <tr>
      <td>Content</td>
      <td><label for="txtcontent"></label>
      <textarea name="txtcontent" id="txtcontent" class="form-control" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td height="31" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn-success"/>
         <a href="Homepage.php"><button class="btn-warning">Cancel</button></a></td>
    </tr>
  </table>
</form>
</div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php ob_flush(); ?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
 	function getplace(did)
	{
		$.ajax({url:"../Assets/AjaxPages/Ajaxplace.php?did="+did,
		success:function(result){
			$("#txtplace").html(result);
		}});
	}
</script><script src="../Assets/JQ/jQuery.js"></script>
<script>
 	function getshop(sid)
	{
		$.ajax({url:"../Assets/AjaxPages/Ajaxshop.php?sid="+sid,
		success:function(result){
			$("#ddlshop").html(result);
		}});
	}
</script>
</html>