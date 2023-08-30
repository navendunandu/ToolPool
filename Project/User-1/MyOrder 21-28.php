<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
if(isset($_GET["cid"]))
{
    $cqry="update tbl_booking set booking_status='10' where booking_id='".$_GET['cid']."'";
    if($conn->query($cqry))
    {
        ?>
        <script>
            alert("Order Cancelled");
            location.href='MyOrder.php';
        </script>
        <?php
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../Assets/Template/Cart/Template/normalize.min.css" />
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
            .orders
            {
                margin-left:40px;
                margin-right:40px;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                align-content: stretch;
                justify-content: center;
            }
        </style>
    </head>
    <body onload="recalculateCart()">
    <?php 
include("Header.php"); ?>
<div class="orders">
        <h1 style="margin-top:20px;">My Order</h1>
            <div class="column-labels" style="margin-top:20px;">
                <label class="product-quantity" style="width:110px">Item</label>
                <label class="product-quantity" style="width:210px">Details</label>	
                <label class="product-quantity" style="width:80px">Price</label>
                <label class="product-quantity" style="width:80px">Quantity</label>
                <label class="product-quantity" style="width:80px">Day Count</label>
                <label class="product-quantity" style="width:80px">Total Price</label>

                <label class="product-quantity" style="width:120px">Action</label>
                <label class="product-quantity" style="width:150px">Status</label>
            </div>
<form method="post">
        <div class="shopping-cart" style="margin-top: 10px">            <?php                
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.user_id='" .$_SESSION["userid"]. "' and booking_status>='2'";
               $res = $conn->query($sel);
                while ($row=$res->fetch_assoc()) {
                    $selPr = "select * from tbl_tool where tool_id ='" .$row["tool_id"]. "'";
                    $respr = $conn->query($selPr);
                    if ($rowpr=$respr->fetch_assoc()) {
                        $selstock = "select sum(stock_quantity) as stock from tbl_stock where tool_id ='".$rowpr["tool_id"]."'";
                        $resst = $conn->query($selstock);
                    if ($rowst=$resst->fetch_assoc()) {
            ?>
            <div class="product">
                <div class="product-image" style="width: 110px; margin: 0px 15px;">
                    <img src="../Assets/File/Tool/<?php echo $rowpr["tool_photo"] ?>"/>
                </div>
                <div class="product-details" style="width: 210px; margin: 0px 15px;">
                    <div class="product-title"><?php echo $rowpr["tool_name"] ?></div>
                    <p class="product-description">
                    <?php echo $rowpr["tool_details"] ?>
                    </p>
                </div>
                <div class="product-price" style="width: 80px; margin: 0px 15px;">
                    <?php echo $rowpr["tool_rentprice"] ?>
                </div>
                <div class="product-quantity" style="width: 80px; margin: 0px 15px;">
                    <h6 align="center"><?php echo $row["cart_qty"] ?></h6>
                </div>
                <div class="product-quantity" style="width: 80px; margin: 0px 15px;">
                        <?php
                            $pr = $rowpr["tool_rentprice"];
                            $qty = $row["cart_qty"];
                            $date = $row["booking_delvdate"];

                            $startTimeStamp = strtotime($date);
                            $endTimeStamp = strtotime(date("Y-m-d"));

                            $timeDiff = abs($endTimeStamp - $startTimeStamp);

                            $numberDays = $timeDiff/86400;

                            $numberDays = intval($numberDays);

                            $tot = (int)$pr * (int)$qty * (int)$numberDays;
                            echo $numberDays;
                        ?>
                    </div>
                    <div class="product-line-price" style="width: 80px; margin: 0px 15px;">
                        <?php
                            $pr = $rowpr["tool_rentprice"];
                            $qty = $row["cart_qty"];
                            $date_expire = $row["booking_delvdate"].' 00:00:00';    
                            $date = new DateTime($date_expire);
                            $now = new DateTime();

                            $numberDays =  $date->diff($now)->format("%d");

                            if($numberDays==0)
                            {
                                echo "0";
                            }
                            else{
                            $tot = ((int)$pr * (int)$qty * (int)$numberDays)-$row["booking_amount"];
                            echo $tot;
                            }
                        ?>
                    </div>
                <div class="product-removal" style="width: 120px; margin: 0px 15px;">
                    <?php
                    if($row["booking_status"]<=8)
                    {    
                        if($row["booking_status"]<=5)
                        { ?>
                            <a href="Myorder.php?cid=<?php echo $row['booking_id'];?>" class="remove-product" style="margin-bottom:10px;">Cancel Order</a><br><br>
                            <?php }
                        else if($row["booking_status"]==6)
                        { ?>
                            <a href="PaymentReturn.php?id=<?php echo $row['booking_id'];?>" class="remove-product" style="margin-bottom:10px;">Return</a><br><br>
                            <?php }
                    }
                    ?>
                    <a href="Postcomplaints.php?bid=<?php echo $row["booking_id"]?>" class="remove-product">Complaint</a><br><br>

                    <a href="Rating.php?tid=<?php echo $rowpr["tool_id"]?>" class="remove-product">Review</a>
                    <br><br>
                    <?php
                        if($rowpr["toolshop_id"]==0)
                        {
                            ?>
                                <a href="UChat.php?id=<?php echo $rowpr["user_id"]?>" class="remove-product">Chat</a>
                            <?php
                        }
                        else if($rowpr["user_id"]==0)
                        {
                            ?>
                            <a href="SChat.php?id=<?php echo $rowpr["toolshop_id"]?>" class="remove-product">Chat</a>
                            <?php
                        }
                    ?>
                </div>
                <div class="product-removal" style="width: 150px; margin: 0px 15px;">
                <?php
                if($row["booking_status"]==2)
                {
                    echo "waiting for shop authorization";
                }
                else if($row["booking_status"]==3)
                {
                    echo "waiting for pickup";
                }
                else if($row["booking_status"]==4)
                {
                    echo "waiting for delivery";
                    
                   }
                   else if($row["booking_status"]==5)
                {
                    echo "out for delevary";
                    
                   }
                   else if($row["booking_status"]==6)
                   {
                       echo "delevered";
                       
                      }
                      else if($row["booking_status"]==7)
                   {
                       echo "Payment Done. Waiting for Pick-up";
                       
                      }
                      else if($row["booking_status"]==8)
                   {
                       echo "Pick-up Complete";
                       
                      }
                      else if($row["booking_status"]==9)
                   {
                       echo "Rejected by Shop";
                       
                      }
                      else if($row["booking_status"]==10)
                   {
                       echo "Order Cancelled";
                       
                      }


                    ?>
                </div>   
            </div> 
        </div>               
            <?php
                }
                }              
                }
                ob_flush();
            ?>

           
</form>
            </div>
        <!-- partial -->
        <script src="../Assets/Template/Cart/Template/jquery.min.js"></script>
    </body>
</html>