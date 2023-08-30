<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<!doctype html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
  <title>Welcome-ToolPool</title>
  <!-- Template CSS -->
  <link rel="stylesheet" href="../Assets/Template/Homepage-User/css/style-starter.css">
  <!-- Template CSS -->
  <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <style>
	.star-light
{
	color:#e9ecef;
}
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
            .checked{
                color:orange;
            }
            .unchecked{
	            color:#e9ecef;
            }
            
        </style>

</head>
<body>
<!--w3l-banner-slider-main-->
<section class="w3l-banner-slider-main">
	<div class="top-header-content">
		<header class="tophny-header">
			<div class="container-fluid">
				<div class="top-right-strip row">
					<!--/left-->
					<div class="top-hny-left-content col-lg-6 pl-lg-0">
						
					</div>
					<!--//left-->
					<!--/right-->
					<ul class="top-hnt-right-content col-lg-6">

						
					</ul>
					<!--//right-->
					<div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							
						</button>
						
					</div>
				</div>
			</div>
			<!--/nav-->
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid serarc-fluid">
						<!--	<img src="../Assets/Images/tp.png" height="150px"> -->
					<!--/search-right-->
					<div class="search-right">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active" style="margin-left: 10px; margin-right: 10px;">
                            <a class="nav-link" href="Homepage.php">Home</a>
                        </li>
                    </ul>
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
							
                        
							<li class="nav-item" style="margin-left: 10px; margin-right: 10px;">
								<a class="nav-link" href="SearchShop.php">Shops</a>
							</li>
							<li class="button-log usernhy" style="margin-left: 10px; margin-right: 10px;">
							<a class="btn-open" href="Myprofile.php">
								<span class="fa fa-user" aria-hidden="true"></span>
							</a>
						</li>
						<a href="MyCart.php" class="top_transmitv_cart" name="submit" value="" style="margin-left: 10px; margin-right: 10px; color:white;">
									My Cart
									<span class="fa fa-shopping-cart"></span></a>
							
						</ul>

					</div>
				</div>
			</nav>
			<!--//nav-->
		</header>
		<div class="container" style="display: flex; align-items: center; justify-content: space-around;align-content: space-around;flex-direction: column;flex-wrap: nowrap;padding: 150px;color:black;font-family:'Arial Black', Gadget, sans-serif;">
    <img src="../Assets/Images/tp.png" height="250px" class="logotrans">
        <h3 align="center" style="margin-top: 30px;" class="tagtrans">One stop for all the Tools and Machines you need....</h3>
        </div>
</section>
<section class="w3l-ecommerce-main">
	<!-- /products-->
	<div class="row">
		<div class="col-lg-2" style="margin-top: 20px;">
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
							<input type="checkbox" onclick="productCheck()" class="form-check-input product_check" id="type" value="<?php echo $row["type_id"]; ?>" ><?php echo $row["type_name"]; ?>
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
		<div class="col-lg-10">

			<div class="ecom-contenthny py-5">
				<div class="container py-lg-5">
					<h3 class="hny-title mb-0 text-center">Shop With <span>Us</span></h3>
					<p class="text-center">Handpicked Favourites just for you</p>
					<!-- /row-->
					<div class="ecom-products-grids row mt-lg-5 mt-3" id="result">
						<?php
								$selProduct = "select * from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where t.user_id!='".$_SESSION['userid']."'";
								$result1 = $conn->query($selProduct);
								while ($row1=$result1->fetch_assoc()) {
							?>
						<div class="col-lg-3 col-6 product-incfhny mt-3">
							<div class="product-grid2 transmitv">
								<div class="product-image2">
									<a href="#">
										
										<img class="pic-2 img-fluid" src="../Assets/File/Tool/<?php echo $row1["tool_photo"]; ?>">
									</a>
									<ul class="social">
										<li><a href="ViewMore.php?id=<?php echo $row1["tool_id"]; ?>" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>	
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<?php
                                            $stock = "select sum(stock_quantity) as stock from tbl_stock where tool_id = '" . $row1["tool_id"] . "'";
											 $result2 = $conn->query($stock);
                            				$row2=$result2->fetch_assoc();
                                                if ($row2["stock"] > 0) {
                                        ?>
											<a href="javascript:void(0)" onclick="addCart('<?php echo $row1['tool_id']; ?>')" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
												</a>
											<?php
                                        } else if ($row2["stock"] == 0) {
                                        ?>
										<a href="javascript:void(0)" class="transmitv-cart ptransmitv-cart add-to-cart">
												Out of Stock
										</a>
											<?php
                                            }
                                         else {
                                        ?>
										<a href="javascript:void(0)" class="transmitv-cart ptransmitv-cart add-to-cart">
												Stock Not Found
										 </a>
											<?php
                                            }
                                        ?>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="#"><?php echo $row1["tool_name"]; ?></a></h3>
									<span class="price">Rent:<?php echo $row1["tool_rentprice"]; ?>/- </span>
								</div>                            
                                <div class="rating">
                                    <?php 
                                        $star="SELECT max(user_rating) as star FROM `tbl_review` where tool_id='".$row1['tool_id']."'";
                                        $count="SELECT count(user_rating) as num FROM `tbl_review` where tool_id='".$row1['tool_id']."'";
                                        $rating=$conn->query($star)->fetch_assoc();
                                        $ratingc=$conn->query($count)->fetch_assoc();
                                        $s=$rating["star"];
                                        $n=$ratingc["num"];
                                        $a=0;          
                                        while($a<$s)
                                        { ?>
                                        <span class="fa fa-star checked"></span>
                                        <?php
                                        $a++;
                                        }
                                        while($a<5)
                                        { ?>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php
                                        $a++;
                                        }
                                        echo "(".$n.")";
                                    ?>
                                </div>
								<div class="custom-alert-box">
                                    <div class="alert-box success">Successful Added to Cart !!!</div>
                                    <div class="alert-box failure">Failed to Add Cart !!!</div>
                                    <div class="alert-box warning">Already Added to Cart !!!</div>
                                </div>
                                <div class="stock-warning">
                                    <?php
                                    $selstock1="select sum(cart_qty) as Qty from tbl_cart where tool_id='".$row1["tool_id"]."' and cart_status>'0'";
                                    $chk=$conn->query($selstock1)->fetch_assoc();
                                    $curstock=$row2["stock"]-$chk["Qty"];
                                    if($curstock<10)
                                    {
                                        if($curstock<=0)
                                        {
                                        ?>
                                        <tr>
                                            <td height="50" valign="middle">
                                            <h6 class="text-danger">Out of Stock</h6>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <tr>
                                            <td height="50" valign="middle">
                                            <h6 class="text-danger">Only <?php echo $row2["stock"] ?> left</h6>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    }                        
                                    ?>
                                </div>
							</div>
						</div>
						<?php
						}
						?>
					</div>
					<!-- //row-->
				</div>
			</div>
		</div>
	</div>
</section>
  <section class="w3l-footer-22">
      <!-- footer-22 -->
      <div class="footer-hny">
          <div class="container py-lg-5">
              <div class="text-txt row">
                  <div class="left-side col-lg-4">
                                    <a class="navbar-brand" href="homepage.php">
                                        <img src="../Assets/Images/tp.png" alt="Your logo" title="Your logo" style="height:100px;" />
                                    </a>
                      
                  </div>
                  <div class="columns col-lg-6 text-lg-right" style="display: flex; align-items: center; justify-content: space-around;
    align-content: space-around;
    flex-direction: column;
    flex-wrap: nowrap;">
                      <p>© 2022 ToolPool. All rights reserved.</p>
                  </div>
                  <button onclick="topFunction()" id="movetop" title="Go to top">
                      <span class="fa fa-angle-double-up"></span>
                  </button>
              </div>
          </div>
      </div>
      <!-- //titels-5 -->
      <!-- move top -->

      <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
              scrollFunction()
          };

          function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  document.getElementById("movetop").style.display = "block";
              } else {
                  document.getElementById("movetop").style.display = "none";
              }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
          }
      </script>
      <!-- /move top -->
  </section>


  </body>

  </html>
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

            function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                    success: function(response) {
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
                    var subcategory = get_filter_text('subcategory');
					var brand = get_filter_text('brand');
					var type = get_filter_text('type');

                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchHomepage.php?action=" + action +"&category=" + category+"&subcategory=" + subcategory + "&brand=" + brand + "&type=" + type ,
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
        
<script src="../Assets/Template/Homepage-User/js/jquery-3.3.1.min.js"></script>
<script src="../Assets/Template/Homepage-User/js/jquery-2.1.4.min.js"></script>
<script>
// optional
		$('#customerhnyCarousel').carousel({
				interval: 5000
    });
  </script>
 <script>
     transmitv.render();

     transmitv.cart.on('transmitv_checkout', function (evt) {
         var items, len, i;

         if (this.subtotal() > 0) {
             items = this.items();

             for (i = 0, len = items.length; i < len; i++) {}
         }
     });
 </script>
 <!-- //cart-js -->
<!--pop-up-box-->
<script src="../Assets/Template/Homepage-User/js/jquery.magnific-popup.js"></script>
<!--//pop-up-box-->
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

  });
</script>
<!--//search-bar-->
<!-- disable body scroll which navbar is in active -->

<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->
<script src="../Assets/Template/Homepage-User/js/bootstrap.min.js"></script>