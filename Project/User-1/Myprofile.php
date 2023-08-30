<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
session_start();
$userid=$_SESSION["userid"];
$viewqry="select * from tbl_user s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id where user_id='".$_SESSION['userid']."'";
$re=$conn->query($viewqry);
$row=$re->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Assets/Template/Login/images/icons/tp.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-image: url(../Assets/Images/1667151276749.jpeg)">

<section>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <img src="../Assets/File/User/<?php echo $row["user_photo"]?>"width="150" height="150">
            <h5 class="my-3"><?php echo $row["user_name"]; ?></h5>
            <div class="d-flex justify-content-center mb-2" style="flex-direction: column;">
              <a href="MyOrder.php" class="btn btn-primary">My Order</a>&nbsp;
              <a href="MyTools.php" class="btn btn-outline-primary ms-1">My Tools</a><br>
            </div>
<div class="d-flex justify-content-center mb-2" style="flex-direction: column;">
              <a href="Edit Profile.php" class="btn btn-primary">Edit Profile</a>&nbsp;
              <a href="Change Password.php" class="btn btn-outline-primary ms-1">Change Password</a>
            </div>
            <ul>
              <li><a href="Postedcomplaints.php">Show Registered Complaints</a></li>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">`
          <h1 style="padding-bottom: 32px;"> My Account</h1><hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["user_email"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["user_contact"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["user_gender"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["user_address"]; ?><br>
                <?php echo $row["place_name"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date Of Joining</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["user_doj"]; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
ob_flush();
?>
</body>
</html>