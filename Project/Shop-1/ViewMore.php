<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include("Header.php");
$viewqry="select * from tbl_tool t inner join tbl_type y on y.type_id=t.type_id inner join tbl_company c on c.company_id=t.company_id inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_category m on m.category_id=s.category_id where tool_id='".$_GET['id']."'";
$result=$conn->query($viewqry);
$row=$result->fetch_assoc() 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
<title>Add To Cart</title>
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
</head>
<body>
  <table width="80%" border="0" align="center">
    <tr>
      <td width="20%" height="137"><img height="200px" src="../Assets/File/Tool/<?php echo $row['tool_photo'];?>" </td>
      <td width="60%"><h1><?php echo $row['tool_name'];?></h1></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="80%" border="0" align="center">
    <tr>
      <td width="13%" height="50" valign="middle">Tool Detail</td>
      <td width="87%" height="13" valign="middle"><?php echo $row['tool_details'];?></td>
    </tr>
    <tr>
      <td height="50" valign="middle">Company</td>
      <td height="13" valign="middle"><?php echo $row['company_name'];?></td>
    </tr>
    <tr>
      <td height="50" valign="middle">Type</td>
      <td height="13" valign="middle"><?php echo $row['type_name'];?></td>
    </tr>
    <tr>
      <td height="50" valign="middle">Category</td>
      <td height="13" valign="middle"><?php echo $row['category_name'];?></td>
    </tr>
    <tr>
      <td height="50" valign="middle">Sub-Category</td>
      <td height="13" valign="middle"><?php echo $row['subcategory_name'];?></td>
    </tr>
    <tr>
      <td height="50" valign="middle">Rent Price</td>
      <td height="13" valign="middle"><?php echo $row['tool_rentprice'];?></td>
    </tr>
    <tr>
      <td height="75" colspan="2" valign="middle"><div>
      <?php
                                            $stock = "select sum(stock_quantity) as stock from tbl_stock where tool_id = '" . $row["tool_id"] . "'";
											 $result2 = $conn->query($stock);
                            				$row2=$result2->fetch_assoc();
                                      ?>
                                        <a href="ShopStock.php?sid=<?php echo $row["tool_id"];?>" class="btn btn-primary">Add Stock</a>
      </div></td>
    </tr>
    <tr>
    <td height="50" valign="middle">
      <?php 
      $selstock1="select sum(cart_qty) as Qty from tbl_cart where tool_id='".$row["tool_id"]."' and cart_status>'0'";
                        $chk=$conn->query($selstock1)->fetch_assoc();
                      $curstock=$row2["stock"]-$chk["Qty"];
                        if($curstock!=0)
                        {
                          ?>
                          <tr>
                          <td height="50" valign="middle">
                          <h6 class="text-danger">Stock left: <?php echo $curstock ?></h6>
                          </td>
                        </tr>
                        <?php
                        }
                        else{
                          ?>
                          <tr>
                          <td height="50" valign="middle">
                          <h6 class="text-danger">Out of Stock</h6>
                          </td>
                        </tr><?php
                        }
                      
                        
                        ?>
    
  </table>
  <p>&nbsp;</p>
</form>
<script src="../Assets/Template/Search/jquery.min.js"></script>
        <script src="../Assets/Template/Search/bootstrap.min.js"></script>
<script src="../Assets/Template/Search/popper.min.js"></script>
        <script>
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
            </script>
            <?php
ob_flush();
?>
</body>
</html>