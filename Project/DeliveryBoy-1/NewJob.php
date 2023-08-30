<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET["bid"]))
{
    $updqry="update tbl_booking set booking_status='5' where booking_id='".$_GET['bid']."'";
    if($conn->query($updqry))
    {
        ?><script>alert ('Job Accepted');
		location.href:"NewJob.php";</script>
        <?php
    }
    else
    {
        ?><script>alert ('Job Accept Failed')</script><?php
    }
}
if(isset($_GET["did"]))
{
    
    $updqry="update tbl_booking set booking_status='6', booking_delvdate='".date("Y-m-d")."' where booking_id='".$_GET['did']."'";
    if($conn->query($updqry))
    {
        ?><script>alert ('Job Accepted');
		location.href:"Orders.php";</script>
        <?php
    }
    else
    {
        ?><script>alert ('Job Accept Failed')</script><?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>New Delivery</title>
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
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <img src="../Assets/Images/tp.png" height="150px">
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="Myprofile.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>My Profile</a>
                    <a href="NewJob.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>New Jobs</a>
                    <a href="Orders.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Orders</a>
                    <a href="Returns.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Returns</a>
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
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['boyname']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <form id="form1" name="form1" method="post" action="">
    <?php
  $viewqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_tool t on t.tool_id=c.tool_id INNER JOIN tbl_user u on u.user_id=b.user_id INNER JOIN tbl_toolshop s on t.toolshop_id=s.toolshop_id where booking_status=4 or booking_status=5 and boy_id='".$_SESSION['boyid']."'";
  $result=$conn->query($viewqry);
	if($result->num_rows>0)
	{
		$i=0;
	?> 
    <table width="200" class="table">
        <tr>
        <td>Sl.No</td>
        <td>Tool name</td>
        <td>Shop Name</td>
        <td>User Name</td>
        <td>Address</td>
        <td>Action</td>
        </tr>
        <?php
    while($row=$result->fetch_assoc())
	  {
		  $i++; ?>
          <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row["tool_name"];?></td>
        <td><?php echo $row["toolshop_name"];?></td>
        <td><?php echo $row["user_name"];?></td>
        <td><?php echo $row["user_address"];?></td>
        <td><?php
        if($row['booking_status']==4)
        { ?>
            <a href="NewJob.php?bid=<?php echo $row['booking_id']?>" class="btn-primary">Accept</a> <?php
        }
        else
        { ?>
            <a href="NewJob.php?did=<?php echo $row['booking_id']?>" class="btn-primary">Delivered</a> <?php
        } ?>
        </td>
        </tr>
        <?php } ?>
    </table>
    
    <?php
	}
	else
	{
		echo "<h1 align='center'>No Jobs Found</h1>";
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