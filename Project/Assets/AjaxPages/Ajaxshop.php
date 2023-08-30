<option value="">-----Select-----</option>
<?php
include("../Connection/Connection.php");
$selqry="select * from tbl_toolshop where place_id='".$_GET["sid"]."'";;
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["toolshop_id"]; ?>"><?php echo $row["toolshop_name"]; ?></option>
            <?php
		} 
		?>
		