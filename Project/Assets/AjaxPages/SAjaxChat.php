<?php
include("../Connection/Connection.php");
session_start();

    $insQry="insert into tbl_schat (schat_fromuid,schat_tosid,schat_content,schat_datetime) values('".$_SESSION["userid"]."','".$_GET["id"]."','".$_GET["chat"]."',DATE_FORMAT(sysdate(), '%M %d %Y, %h:%i %p'))";
    if($conn->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
    }
    
?>