<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Search</title>
        <link rel="stylesheet" href="../Assets/Template/Homepage-User/css/style-starter.css">
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
        <!-- Template CSS -->
        <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
        <script src="../Assets/Template/Homepage-User/js/jquery-3.3.1.min.js"></script>
        <script src="../Assets/Template/Homepage-User/js/jquery-2.1.4.min.js"></script>
        <script src="../Assets/Template/Homepage-User/js/jquery.magnific-popup.js"></script>
        <script src="../Assets/Template/Homepage-User/js/bootstrap.min.js"></script>
        <style>
              .texttrans{
                animation: .6s cubic-bezier(0.4, 0, 1, 1) 0s 1 slideInFromBottom;
              } 
              .addbtn
              {
                display: flex;
                flex-wrap: nowrap;
                justify-content: center;
              }      
        </style>
    </head>
<body>
<section class="w3l-banner-slider-main">
	<div class="top-header-content">
		<header class="tophny-header">			
			<!--/nav-->
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid serarc-fluid">
							
					<!--/search-right-->
					<div class="search-right">
                    <ul class="navbar-nav ml-auto">
							<li class="nav-item active" style="margin-left: 10px;margin-right: 10px;">
								<a class="nav-link" href="Homepage.php">Home</a>
							</li>
                    </ul>
						<!-- search popup -->
						
						<!-- /search popup -->
					</div>
					<!--//search-right-->
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa fa-bars"> </span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							
							<li class="button-log usernhy" style="margin-left: 10px;margin-right: 10px;">
							    <a class="btn-open" href="Myprofile.php">
								<span class="fa fa-user" aria-hidden="true"></span>
							    </a>
                            </li>
                            <a href="Showorder.php" class="top_transmitv_cart" name="submit" value="" style="margin-left: 10px;margin-right: 10px;">
                                Orders
                            </a>
						</ul>
					</div>
				</div>
			</nav>
			<!--//nav-->
		</header>
		<div class="container" style="
            display: flex;
            align-items: center;
            justify-content: space-around;
            align-content: space-around;
            flex-direction: column;
            flex-wrap: nowrap;
            padding: 100px;
            color:black;
            font-family:'Arial Black', Gadget, sans-serif;">
            <img src="../Assets/Images/tp.png" height="250px" class="logotrans">
            <h1 class="texttrans">WELCOME</h1>
            <h2 class="texttrans" align="center"><?php echo $_SESSION["shopname"];?></h2><h3 class="texttrans" align="center">One stop for all the Tools and Machines you need....</h3>
        </div>
</section>
    <div class="container-fluid">
        <div class="row" style="margin-top: 50px;">
            <div class="col-lg-3">
                <h5>Filter Product</h5>
                <hr>
                <h6 class="text-info"> Select Brand</h6>
                <ul class="list-group">
                    <?php                           
                        $selbrand = "SELECT * from tbl_company";
                        $result = $conn->query($selbrand);
                        while ($row=$result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" id="brand" value="<?php echo $row["company_id"]; ?>" ><?php echo $row["company_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php
                        }
                    ?>	
                </ul>
                <br>
                <h6 class="text-info"> Select Type</h6>
                <ul class="list-group">
                    <?php                           
                        $seltype = "SELECT * from tbl_type";
                        $result = $conn->query($seltype);
                        while ($row=$result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" id="type`	" value="<?php echo $row["type_id"]; ?>" ><?php echo $row["type_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php
                        }
                    ?>	
                </ul>
                <br />
                <h6 class="text-info"> Select Category</h6>
                <ul class="list-group">
                    <?php                           
                        $selCat = "SELECT * from tbl_category";
                        $result = $conn->query($selCat);
                        while ($row=$result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category"><?php echo $row["category_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php
                        }
                    ?>	
                </ul>
                <br />
                <h6 class="text-info"> Select Sub Category</h6>
                <ul class="list-group" id="subcat">
                </ul>
                <br />                
            </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Template/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">
                        <?php
                            $selProduct = "select * from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where toolshop_id='".$_SESSION['shopid']."'";
                            $result1 = $conn->query($selProduct);
                            while ($row1=$result1->fetch_assoc()) {
                        ?>
                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/File/Tool/<?php echo $row1["tool_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center p-1"><?php echo $row1["tool_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title text-danger" align="center">
                                           Rent Price/Day : <?php echo $row1["tool_rentprice"]; ?>/-
                                        </h6>
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["subcategory_name"]; ?><br>
                                        </p>
                                        <?php
                                            $stock = "select sum(stock_quantity) as stock from tbl_stock where tool_id = '" . $row1["tool_id"] . "'";
											 $result2 = $conn->query($stock);
                            				$row2=$result2->fetch_assoc();
                                                if ($row2["stock"] > 0) {
                                        ?>
                                        
                                        <div class="btn btn-success btn-block"">In Stock</div>
                                        <?php
                                        } else if ($row2["stock"] == 0) {
                                        ?>
                                        <div class="btn btn-danger btn-block">Out of Stock</div>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <div class="btn btn-warning btn-block">Stock Not Found</div>
                                        <?php
                                            }
                                        ?>
                                        <a href="ViewMore.php?id=<?php echo $row1["tool_id"]; ?>" class="btn btn-warning btn-block">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="container addbtn">
                            <a href="AddTool.php" class="btn btn-primary">Add Tool</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../Assets/Template/Search/jquery.min.js"></script>
        <script src="../Assets/Template/Search/bootstrap.min.js"></script>
        <script src="../Assets/Template/Search/popper.min.js"></script>
        <script>
function changeSub()
            {
                var cat = get_filter_text('category');
                if (cat.length !== 0)
                {
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchSubCat.php?data=" + cat,
                        success: function(response) {
                            $("#subcat").html(response);
                        }
                    });
                }
                else
                {
                    $("#subcat").html("");
                }
                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push("\'" + $(this).val() + "\'");
                    });
                    return filterData;
                }
            }
            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
                    var subcategory = get_filter_text('subcategory');
					var brand = get_filter_text('brand');
					var type = get_filter_text('type');
                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchShop.php?action=" + action +"&category=" + category+"&subcategory=" + subcategory + "&brand=" + brand + "&type=" + type ,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });
                }
                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }            
        </script>
    </body>
</html>