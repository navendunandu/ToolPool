<?php
include("../Connection/Connection.php");

    
        if ($_GET["id"]="1") {
            $newviewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id  where toolshop_vstatus=3;";
            $re=$conn->query($newviewqry);
        }
        else if ($_GET["id"]="2") {
            $acpviewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id  where toolshop_vstatus=1;";
            $re=$conn->query($acpviewqry);
        }

        else if ($_GET["id"]="3") {
            $rejviewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id  where toolshop_vstatus=2;";
            $re=$conn->query($rejviewqry);
        }
?>

<div class="shoplist">
        <div class="row">
            <?php
            echo $_GET["id"];
             if ($_GET["id"]="1") {
                $newviewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id  where toolshop_vstatus=3;";
                $re=$conn->query($newviewqry);
            }
            else if ($_GET["id"]="2") {
                $acpviewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id  where toolshop_vstatus=1;";
                $re=$conn->query($acpviewqry);
            }
    
            else if ($_GET["id"]="3") {
                $rejviewqry="select * from tbl_toolshop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id  where toolshop_vstatus=2;";
                $re=$conn->query($rejviewqry);
            }
            if($re->num_rows>0)
            { ?>
            <h1 align="center"><b><u>Shop List</u></b></h1><br>
        </div>
            <div class="row">
                <form id="form1" name="form1" method="post" action="">
                <table width="759" border="1">
                    <tr>
                    <td width="44">Sl.No</td>
                    <td width="102">Shop Name</td>
                    <td width="90">E-mail</td>
                    <td width="127">Contact No:</td>
                    <td width="110">Address</td>
                    <td width="124">District</td>
                    <td width="132">Place</td>
                    </tr>
                    </tr>
                        <?php
                        $i=0;
                        while($row=$re->fetch_assoc())
                        {
                            $i++; ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row["toolshop_name"];?></td>
                                <td><?php echo $row["toolshop_email"];?></td>
                                <td><?php echo $row["toolshop_contact"];?></td>
                                <td><?php echo $row["toolshop_address"];?></td>
                                <td><?php echo $row["district_name"];?></td>
                                <td><?php echo $row["place_name"];?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
                </form>
                <?php
            }
            else
            {
                echo "<h1 align='center'>No Shops Entered</h1>";
            } ?>
            </div>