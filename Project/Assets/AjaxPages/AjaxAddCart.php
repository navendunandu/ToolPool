<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where user_id='".$_SESSION["userid"]."' and booking_status='0' ";
$result=$conn->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["booking_id"];
		
		
		
		$selqry="select * from tbl_cart where booking_id='".$bid."'and tool_id='".$_GET["id"]."'";
		$result=$conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_cart(tool_id,booking_id)values('".$_GET["id"]."','".$bid."')";
         if($conn->query($insQry1))
          { 
             echo "Added to Cart";
          }
         else
          {
	     echo"Failed";
          }
		}
		
	}	
}
else
{
	$insqry="insert into tbl_booking(user_id) value('".$_SESSION['userid']."')";
	if ($conn->query($insqry))
	{
		$selqry="select MAX(booking_id) as id from tbl_booking where booking_status='0'";
		$res=$conn->query($selqry);
		if($row=$res->fetch_assoc())
		{
			//$bid=$row["booking_id"];
			$insqry1="insert into tbl_cart(tool_id,booking_id)values('".$_GET['id']."','".$row["id"]."')";
			$selqry1="select * from tbl_cart where booking_id='".$row["id"]."'";
			$result=$conn->query($selqry1);
			if($result->num_rows>0)
			{
				echo "Already Added to Cart";
			}
			else
			{
					
				if($conn->query($insqry1))
				{
					echo "Added to Cart";
				}
				else
				{
					echo "Failed";
				}
			}
		}
	}
}
?>
