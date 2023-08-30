<?php
include("../Connection/Connection.php");
session_start();

    $insQry="insert into tbl_uchat (uchat_fromuid,uchat_touid,uchat_content,uchat_datetime) values('".$_SESSION["userid"]."','".$_GET["id"]."','".$_GET["chat"]."',DATE_FORMAT(sysdate(), '%M %d %Y, %h:%i %p'))";
    if($conn->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
    }
    
?>