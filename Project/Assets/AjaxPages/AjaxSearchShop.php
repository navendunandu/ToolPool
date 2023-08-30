<?php
session_start();
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "select * from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where true and toolshop_id='".$_SESSION['shopid']."'";
        $rowR = "SELECT count(*) as count from tbl_tool t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_company y on y.company_id=t.company_id inner join tbl_type p on p.type_id=t.type_id inner join tbl_category c on c.category_id=s.category_id where true and toolshop_id='".$_SESSION['shopid']."'";

        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $rowR = $rowR." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND s.subcategory_id IN(".$subcategory.")";
            $rowR = $rowR." AND s.subcategory_id IN(".$subcategory.")";
        }

        if ($_GET["brand"]!=null) {

            $brand = $_GET["brand"];

            $sqlQry = $sqlQry." AND y.company_id IN(".$brand.")";
            $rowR = $rowR." AND y.company_id IN(".$brand.")";
        }
		
	       if ($_GET["type"]!=null) {

            $type = $_GET["type"];

            $sqlQry = $sqlQry." AND p.type_id IN(".$type.")";
            $rowR = $rowR." AND p.type_id IN(".$type.")";
        }
        $resultS = $conn->query($sqlQry);
        $resultR = $conn->query($rowR);
        
        $rowRR = $resultR->fetch_assoc();

        if ($rowRR["count"] > 0) {
            while ($rowRS = $resultS->fetch_assoc()) {

                
?>

<div class="col-md-3 mb-2">
    <div class="card-deck">
        <div class="card border-secondary">
            <img src="../Assets/File/Tool/<?php echo $rowRS["tool_photo"]; ?>" class="card-img-top" height="250">
            <div class="card-img-secondary">
                <h6  class="text-light bg-info text-center p-1"><?php echo $rowRS["tool_name"]; ?></h6>
            </div>
            <div class="card-body">
                <h6 class="card-title text-danger" align="center">
                    Rent Price/Day : <?php echo $rowRS["tool_rentprice"]; ?>/-
                </h6>
                <p align="center">
                    <?php echo $rowRS["category_name"]; ?><br>
                    <?php echo $rowRS["subcategory_name"]; ?><br>
                </p>
                <?php
                    $stock = "select sum(stock_quantity) as stock from tbl_stock where tool_id = '" . $rowRS["tool_id"] . "'";
                        $result2 = $conn->query($stock);
                    $rowR2=$result2->fetch_assoc();
                        if ($rowR2["stock"] > 0) {
                ?>
                
                <div class="btn btn-success btn-block"">In Stock</div>
                <?php
                } else if ($rowR2["stock"] == 0) {
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
                <a href="ViewMore.php?id=<?php echo $rowRS["tool_id"]; ?>" class="btn btn-warning btn-block">View More</a>
            </div>
        </div>
    </div>
</div>
    <?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }
    ?>
