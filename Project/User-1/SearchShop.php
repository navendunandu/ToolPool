<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
   <style>
            
        </style>
</head>

<body>
    <div class="container">
        <h5 class="text-center" id="textChange">All Shops</h5>
        <hr>
        <div class="text-center">
            <img src="../Assets/Template/Search/loader.gif" id='loder' width="200" style="display: none"/>
        </div>
        <div class="row" id="result">
            <?php
                $selProduct = "select * from tbl_toolshop";
                $result1 = $conn->query($selProduct);
                while ($row1=$result1->fetch_assoc()) {
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../Assets/File/Shop/<?php echo $row1["toolshop_logo"]; ?>" class="card-img-top" height="250">
                        <div class="card-img-secondary">
                            <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["toolshop_name"]; ?></h6>
                        </div>
                        <a href="ViewShopDetails.php?id=<?php echo $row1["toolshop_id"]; ?>" class="btn btn-primary btn-block">View More</a>
                    </div>
                </div>
            </div>
            <?php
                }
                ob_flush();
            ?>            
        </div>
    </div>
        <script src="../Assets/Template/Search/jquery.min.js"></script>
        <script src="../Assets/Template/Search/bootstrap.min.js"></script>
        <script src="../Assets/Template/Search/popper.min.js"></script>
</body>
</html>