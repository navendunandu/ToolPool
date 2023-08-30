<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include("Header.php");
$viewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id where toolshop_id='".$_GET['id']."'";
$re=$conn->query($viewqry);
$row=$re->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shop Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
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
                        <img src="../Assets/File/Shop/<?php echo $row["toolshop_logo"]?>"width="150" height="150">
                        <h5 class="my-3"><?php echo $row["toolshop_name"]; ?></h5>
                        <div class="d-flex justify-content-center mb-2" style="flex-direction: column;">
                            <!-- <a href="ViewMore.php" class="btn btn-primary">Show Tools</a>&nbsp; -->
                            <!-- <a href="My Chat.php" class="btn btn-primary">Chat</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">`
                        <h1 style="padding-bottom: 32px;">Shop Details</h1><hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["toolshop_email"]; ?></p>
                            </div>
                        </div>  
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["toolshop_contact"]; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["toolshop_address"]; ?><br>
                                <?php echo $row["place_name"]; ?><br>
                                <?php echo $row["district_name"]; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Date Of Joining</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["toolshop_doj"]; ?>
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