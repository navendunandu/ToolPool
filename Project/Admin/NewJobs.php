<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET["`aid`"]))
{
    $boy=$_POST["listboy"];
    $bookingid=$_POST["txtbooking"];
    $updqry="update tbl_booking set boy_id='".$boy."' where booking_id='".$bookingid."'";
    //echo $updqry;
    if($conn->query($updqry))
    {
        ?><script>alert ('Job Assigned')</script>";<?php
		header("Location:../Admin/NewJobs.php");
    }
    else
    {
        ?><script>alert ('Job Assigning Failed')</script><?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ToolPool-New Jobs</title>
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
					<a href="NewJobs.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>New Jobs</a>
                    <a href="Reports.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reports</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="District.php" class="dropdown-item">District</a>
                            <a href="Place.php" class="dropdown-item">Place</a>
                            <a href="Category.php" class="dropdown-item">Category</a>
                            <a href="Company.php" class="dropdown-item">Company</a>
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
            <div class="container">
                <form id="form1" name="form1" method="post" action="">
                
                <?php
                $viewqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_tool t on t.tool_id=c.tool_id INNER JOIN tbl_user u on u.user_id=b.user_id INNER JOIN tbl_toolshop s on t.toolshop_id=s.toolshop_id where booking_status=3";
                $result=$conn->query($viewqry);
                if($result->num_rows>0)
                {
                    $i=0;
                ?> 
                <h3 style="margin: 20px;" align="center">New Jobs</h3>
                <table width="200" class="table" style="margin: 30px;width: 95% !important;">
                    <tr>
                    <td class="align-bottom">Sl.No</td>
                    <td class="align-bottom">Tool name</td>
                    <td class="align-bottom">Shop Name</td>
                    <td class="align-bottom">User Name</td>
                    <td class="align-bottom">Address</td>
                    <td class="align-bottom">Delivery Boy</td>
                    </tr>
                    <?php
                while($row=$result->fetch_assoc())
                {
                    $i++; ?>
                    <tr>
                        <td class="align-bottom"><?php echo $i;?></td>
                        <td class="align-bottom"><?php echo $row["tool_name"];?></td>
                        <td class="align-bottom"><?php echo $row["toolshop_name"];?></td>
                        <td class="align-bottom"><?php echo $row["user_name"];?></td>
                        <td class="align-bottom"><?php echo $row["user_address"];?></td>
                        <td width="201" class="align-baseline"><label for="listdist"></label>
                            <select name="listboy" id="listboy" class="form-control" onchange="assignValue(<?php echo $row['booking_id'];?>,this.value)">
                                <option>---Select---</option>
                                <?php
                                $selqry="select * from tbl_deliveryboy";
                                $re=$conn->query($selqry);
                                while($row=$re->fetch_assoc())
                                {
                                    ?>
                                    <option value="<?php echo $row["boy_id"]; ?>"><?php echo $row["boy_name"]; ?></option>
                                    <?php
                                } 
                                ?>
                            </select>
                        </td>
                    </tr>
                    <?php } ?>
                </table>   
                <?php
                }
                else
                {
                    echo "<h3 align='center'>No New Jobs Found</h3>";
                }
                ?>
                <hr>
                <!-- Present Jobs-->
                <?php
                $viewqry1="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_tool t on t.tool_id=c.tool_id INNER JOIN tbl_user u on u.user_id=b.user_id INNER JOIN tbl_toolshop s on t.toolshop_id=s.toolshop_id INNER JOIN tbl_deliveryboy d on d.boy_id=b.boy_id where b.boy_id!=0";
                $result1=$conn->query($viewqry1);
                if($result1->num_rows>0)
                {
                    $i=0;
                ?> 
                <h3 style="margin: 20px;" align="center">Present Jobs</h3>
                <table width="200" class="table" style="margin: 30px;width: 95% !important;">
                    <tr>
                    <td class="align-bottom">Sl.No</td>
                    <td class="align-bottom">Tool name</td>
                    <td class="align-bottom">Shop Name</td>
                    <td class="align-bottom">User Name</td>
                    <td class="align-bottom">Address</td>
                    <td class="align-bottom">Delivery Boy</td>
                    <td class="align-bottom">Status</td>
                    </tr>
                    <?php
                while($row1=$result1->fetch_assoc())
                {
                    $i++; ?>
                    <tr>
                        <td class="align-bottom"><?php echo $i;?></td>
                        <td class="align-bottom"><?php echo $row1["tool_name"];?></td>
                        <td class="align-bottom"><?php echo $row1["toolshop_name"];?></td>
                        <td class="align-bottom"><?php echo $row1["user_name"];?></td>
                        <td class="align-bottom"><?php echo $row1["user_address"];?></td>
                        <td class="align-bottom"><?php echo $row1["boy_name"];?></td>
                        <td class="align-bottom">
                            <?php
                            if($row1['booking_status']=4)
                            {
                                echo "Delivery Pending";
                            }
                            else if($row1['booking_status']=5)
                            {
                                echo "Out for Delivery";
                            }
                            else if($row1['booking_status']=6)
                            {
                                echo "Delivery Completed";
                            }
                            ?>
                        </td>                             
                    </tr>
                    <?php } ?>
                </table>   
                <?php
                }
                else
                {
                    echo "<h3 align='center'>No  Jobs Found</h3>";
                }
                ?>
                </form>
            </div>
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
<script src="../Assets/JQ/JQuery.js"></script>
<script>
	function assignValue(bid,boyid)
	{
		$.ajax({url:"../Assets/AjaxPages/AjaxBoy.php?bid="+bid+"&boyid="+boyid,
		success: function(result){
			location.reload();
		}});
	}
	</script>
</html>