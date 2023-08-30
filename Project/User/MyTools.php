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
            .custom-alert-box{
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>

<body>
        <div class="container-fluid">
            <div class="row">
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
                        <?php                           
						//  $selSubCat = "SELECT * from tbl_subcategory";
                        //     $resultsc = $conn->query($selSubCat);
                        //     while ($rowsc=$resultsc->fetch_assoc()) {
                        ?>
                        <!-- <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onchange="productCheck()" class="form-check-input product_check" value="
                                    <?php //echo $rowsc["subcategory_id"]; ?>" id="subcategory">
                                    <?php// echo $rowsc["subcategory_name"]; ?>
                                </label>
                            </div>
                        </li> -->
                        <?php
                            // }
                        ?>
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
                            $selProduct = "select * from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where user_id='".$_SESSION['userid']."'";
                            $result1 = $conn->query($selProduct);
                            while ($row1=$result1->fetch_assoc()) {
                        ?>

                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/File/Tool/<?php echo $row1["tool_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["tool_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["tool_rentprice"]; ?>/-
                                        </h4>
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
                                        
                                        <a href="javascript:void(0)")" class="btn btn-success btn-block"">In Stock</a>
                                        <?php
                                        } else if ($row2["stock"] == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block"">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block"">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                        <a href="ViewMoreTools.php?id=<?php echo $row1["tool_id"]; ?>" class="btn btn-primary btn-block">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            ob_flush();
                        ?>
                        
                    </div>
                    <div class="container">
                            <a href="AddTool.php" class="btn-primary" style="
    text-decoration: none;
">Add Tools</a>
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
                        url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action +"&category=" + category+"&subcategory=" + subcategory + "&brand=" + brand + "&type=" + type ,
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