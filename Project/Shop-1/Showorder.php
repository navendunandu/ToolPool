
 <?php
 include("Header.php");
    ?>
<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();

if(isset($_GET["id"]))
{
	$upqry="update tbl_booking set booking_status='3' where booking_id='".$_GET["id"]."'";
	if($conn->query($upqry))
	{
		?><script>alert ('Order Accepted')</script>";<?php
		header("Location:../Shop/Showorder.php");
	}
	if(isset($_GET["rid"]))
    {
		$upqry1="update tbl_booking set booking_status='7' where booking_id='".$_GET["rid"]."'";
	    if($conn->query($upqry1))
        {
            ?><script>alert ('Order Rejected')</script>";<?php
            header("Location:../Shop/Showorder.php");
            
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
        <link rel="stylesheet" href="../Assets/Template/Cart/Template/normalize.min.css" />
        <title>Orders</title>
        <style>
            .product-image {
                float: left;
                width: 10%;
            }
            .product-details {
                float: left;
                width: 16%;
            }
            .product-price {
                float: left;
                width: 7%;
            }
            .product-quantity {
                float: left;
                width: 7%;
            }
            .product-removal {
                float: left;
                width: 10%;
            }
            .product-line-price {
                float: left;
                width: 7%;
                text-align: center;
            }
			.product-review {
                float: left;
                width: 10%;
                text-align: center;
            }
            /* This is used as the traditional .clearfix class */
            .group:before,
            .shopping-cart:before,
            .column-labels:before,
            .product:before,
            .totals-item:before,
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                content: "";
                display: table;
            }
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                clear: both;
            }
            .group,
            .shopping-cart,
            .column-labels,
            .product,
            .totals-item {
                zoom: 1;
            }
            /* Apply clearfix in a few places */
            /* Apply dollar signs */
            .product .product-price:before,
            .product .product-line-price:before,
            .totals-value:before {
                content: "₹";
            }
            /* Body/Header stuff */
            body {
                padding: 0px 30px 30px 20px;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                    "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
            }
            h1 {
                font-weight: 100;
            }
            label {
                color: #aaa;
            }
            .shopping-cart {
                margin-top: -45px;
            }
            /* Column headers */
            .column-labels label {
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
            .column-labels .product-image,
            .column-labels .product-details,
            .column-labels .product-removal {
                text-indent: -9999px;
            }
            /* Product entries */
            .product {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .product .product-image {
                text-align: center;
            }
            .product .product-image img {
                width: 100px;
            }
            .product .product-details .product-title {
                margin-right: 20px;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .product .product-details .product-description {
                margin: 5px 20px 5px 0;
                line-height: 1.4em;
            }
            .product .product-quantity input {
                width: 40px;
            }
            .product .remove-product {
                border: 0;
                padding: 4px 8px;
                background-color: #c66;
                color: #fff;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                font-size: 12px;
                border-radius: 3px;
				text-decoration:none;
				width:100px;
				
            }
            .product .remove-product:hover {
                background-color: #a44;
            }
            /* Totals section */
            .totals .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;
            }
            .totals .totals-item label {
                float: left;
                clear: both;
                width: 79%;
                text-align: right;
            }
            .totals .totals-item .totals-value {
                float: right;
                width: 21%;
                text-align: right;
            }
            .totals .totals-item-total {
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .checkout {
                float: right;
                border: 0;
                margin-top: 20px;
                padding: 6px 25px;
                background-color: #6b6;
                color: #fff;
                font-size: 25px;
                border-radius: 3px;
            }
            .checkout:hover {
                background-color: #494;
            }
            /* Make adjustments for tablet */
            @media screen and (max-width: 650px) {
                .shopping-cart {
                    margin: 0;
                    padding-top: 20px;
                    border-top: 1px solid #eee;
                }
                .column-labels {
                    display: none;
                }
                .product-image {
                    float: right;
                    width: auto;
                }
                .product-image img {
                    margin: 0 0 10px 10px;
                }
                .product-details {
                    float: none;
                    margin-bottom: 10px;
                    width: auto;
                }
                .product-price {
                    clear: both;
                    width: 70px;
                }
                .product-quantity {
                    width: 100px;
                }
                .product-quantity input {
                    margin-left: 20px;
                }
                .product-quantity:before {
                    content: "x";
                }
                .product-removal {
                    width: auto;
                }
                .product-line-price {
                    float: left	;
                    width: 70px;
                }
            }
            /* Make more adjustments for phone */
            @media screen and (max-width: 350px) {
                .product-removal {
                    float: right;
                }
                .product-line-price {
                    float: right;
                    clear: left;
                    width: auto;
                    margin-top: 10px;
                }
                .product .product-line-price:before {
                    content: "Item Total: ₹";
                }
                .totals .totals-item label {
                    width: 60%;
                }
                .totals .totals-item .totals-value {
                    width: 40%;
                }
            }
            label{
                margin: 0px 15px;
            }
            /*SWITCH 2 ------------------------------------------------*/
            .switch2{
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
                border-radius: 27px;
                background-color: #bdc3c7;
                cursor: pointer;
                transition: all .3s;
            }
            .switch2 input{
                display: none;
            }
            .switch2 input:checked + div{
                left: calc(100% - 40px);
            }
            .switch2 div{
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 25px;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                transition: all .2s;
            }
            .switch2-checked{
                background-color: #2ecc71;
            }
        </style>
    </head>
   
    <body>
        <h1>My Order</h1>
            <div class="column-labels">
                <label class="product-quantity" style="width:110px">Item</label>
                <label class="product-quantity" style="width:210px">Details</label>	
                <label class="product-quantity" style="width:80px">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-quantity">Total Price</label>
                <label class="product-quantity">Action</label>
            </div>
        <form method="post">
        <div class="shopping-cart" style="margin-top: 50px">            <?php                
            $sel ="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_tool t on t.tool_id=c.tool_id where booking_status='2' and t.toolshop_id='".$_SESSION['shopid']."'";
            
            $res = $conn->query($sel);
                while ($row=$res->fetch_assoc()) {
                        $selstock = "select sum(stock_quantity) as stock from tbl_stock where tool_id ='".$row["tool_id"]."'";
                        $resst = $conn->query($selstock);
                        $rowst=$resst->fetch_assoc()
            ?>
            <div class="product">
                <div class="product-image">
                    <img src="../Assets/File/Tool/<?php echo $row["tool_photo"] ?>"/>
                </div>
                <div class="product-details">
                    <div class="product-title"><?php echo $row["tool_name"] ?></div>
                    <p class="product-description">
                    <?php echo $row["tool_details"] ?>
                    </p>
                </div>
                <div class="product-price "	><?php echo $row["tool_rentprice"] ?></div>
                    <div class="product-quantity">
                        <?php echo $row["cart_qty"] ?>
                    </div>
                
                    <div class="product-line-price">
                        <?php
                            $pr = $row["tool_rentprice"];
                            $qty = $row["cart_qty"];
                            $tot = (int)$pr * (int)$qty;
                            echo $tot;
                        ?>
                    </div>
                    <div class="product-removal" style="margin-left:50px">
                     <a href="showorder.php?id=<?php echo $row['booking_id'];?>">Accept</a><br>
                     <a href="showorder.php?rid=<?php echo $row['booking_id'];?>">Reject</a><br>
                    </div>
                    </div>
                   
            <?php
                    }
            ?>

           
</form>
                
        <!-- partial -->
        <script src="../Assets/Template/Cart/Template/jquery.min.js"></script>
    </body>
    <?php
ob_flush();
?>
</html>