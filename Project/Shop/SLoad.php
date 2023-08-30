
<?php
include("../Assets/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_schat dc inner join tbl_toolshop u on (u.toolshop_id=dc.schat_tosid) or (u.toolshop_id=dc.schat_fromsid) where u.toolshop_id='".$_SESSION["shopid"]."' order by schat_id";
    $rowdis=$conn->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["schat_fromuid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_user where user_id='".$_GET["id"]."'";
    $rowdis1=$conn->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/File/User/<?php echo $datadis1["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["schat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
        }

} else {
    
?>
<div class="chat-message is-sent">
    <img src="../Assets/File/Shop/<?php echo $datadis["toolshop_logo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["toolshop_name"] ?></span>
        <div class="message-text"><?php echo $datadis["schat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>