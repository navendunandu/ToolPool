<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "select * from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where true ";

        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND s.subcategory_id IN(".$subcategory.")";
        }

        if ($_GET["brand"]!=null) {

            $brand = $_GET["brand"];

            $sqlQry = $sqlQry." AND y.company_id IN(".$brand.")";
        }
		
	       if ($_GET["type"]!=null) {

            $type = $_GET["type"];

            $sqlQry = $sqlQry." AND p.type_id IN(".$type.")";
        }
        $resultS = $conn->query($sqlQry);
        
       
        
?>

    <?php
    while ($row1=$resultS->fetch_assoc()) 
    {
            ?>
        <div class="col-lg-3 col-6 product-incfhny mt-3">
            <div class="product-grid2 transmitv">
                <div class="product-image2">
                    <a href="#">
                        
                        <img class="pic-2 img-fluid" src="../Assets/File/Tool/<?php echo $row1["tool_photo"]; ?>">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>	
                    </ul>
                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="transmitv_item" value="Women Maroon Top">
                            <input type="hidden" name="amount" value="899.99">
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
    } ?>
<?php } ?>
    