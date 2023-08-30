<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btnsubmit"]))
{
	$company=$_POST["txtcompany"];
	$selqry="select * from tbl_company where company_name='".$company."'";
	$re=$conn->query($selqry);
	if($row=$re->fetch_assoc())
	{
		?>
        <script>
		alert('Already Exist');
		location.href='company.php';
		</script>
        <?php
	}
	else
	{
		$insqry="insert into tbl_company(company_name) values('".$company."')";
		if($conn->query($insqry))
		{
			?>
        <script>
		alert('Data Inserted');
		location.href='Company.php';
		</script>
        <?php
		}
		else
		{
				?>
        <script>
		alert('Data Insertion failed');
		</script>
        <?php
		}
	}
}

if(isset($_GET["id"]))
{
	$delqry="delete from tbl_company where company_id='".$_GET["id"]."'";
	if($conn->query($delqry))
	{
			?>
        <script>
		alert('Data Deleted');
		location.href='Company.php';
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ToolPool-Company</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/Template/Admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/Template/Admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Template/Admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Template/Admin/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
         <!-- Spinner Start -->
         <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="homepage.php" class="navbar-brand mx-4 mb-3">
                    <img src="../Assets/Images/tp.png" height="150px">
                </a>
                <div class="navbar-nav w-100">
                    <a href="homepage.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Shops</a>
                        <div class="dropdown-menu bg-transparent border-0">
                             <a href="ShopList.php" class="dropdown-item">Shop List</a>
                            <a href="NewShopList.php" class="dropdown-item">New Shop List</a>
                            <a href="ShopListAccepted.php" class="dropdown-item">Shop List Accepted</a>
                            <a href="ShopListRejected.php" class="dropdown-item">Shop List Rejected</a>
                        </div>
                    </div>
                    <a href="Complaints.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Complaints</a>
                    <a href="NewJobs.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>New Jobs</a>
                    <a href="Reports.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reports</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="District.php" class="dropdown-item">District</a>
                            <a href="Place.php" class="dropdown-item">Place</a>
                            <a href="Category.php" class="dropdown-item">Category</a>
                            <a href="Company.php" class="dropdown-item active">Company</a>
                            <a href="Type.php" class="dropdown-item">Type</a>
                            <a href="ComplaintType.php" class="dropdown-item">Complaint Type</a>
                            <a href="SubCategory.php" class="dropdown-item">Sub Category</a>                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../Assets/Template/Admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['username']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
<h1 align="center"><u>Company Name</u></h1>
<form id="form1" name="form1" method="post" action="">
  <table width="351" border="0" align="center">
    <tr>
      <td width="170" align="left">Company Name</td>
      <td width="165" align="center"><label for="txtcompany"></label>
      <input company="text" name="txtcompany" id="txtcompany" required="required"/></td>
    </tr>
    <tr>
    	<td height="33" colspan="2" align="center" valign="bottom"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
	<p>
	  <?php
	$selqry="select * from tbl_company";
	$result=$conn->query($selqry);
	if($result->num_rows>0)
	{
	?>
  </p>
  <table width="361" border="1" align="center">
      <tr>
        <td width="52">Sl.No</td>
        <td width="182">Company Name</td>
        <td width="105">Action</td>
      </tr>
	  <?php
	  $i=0;
	  while($row=$result->fetch_assoc())
	  {
		  $i++
	?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $row["company_name"];?></td>
		<td><a href="company.php?id=<?php echo $row["company_id"];?>">Delete</a></td>
	</tr>
	<?php			 
	  }
	  ?>
  </table>
	<?php
	}
	else{
		?>
	<h1 align="center">No Data on Found</h1>
	<?php
	}
	?>
</form>
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Template/Admin/lib/chart/chart.min.js"></script>
    <script src="../Assets/Template/Admin/lib/easing/easing.min.js"></script>
    <script src="../Assets/Template/Admin/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Template/Admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Assets/Template/Admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../Assets/Template/Admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../Assets/Template/Admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assets/Template/Admin/js/main.js"></script>
</body>

</html>