<?php
include "inc/header.php";
include "database/config.php";
include "database/database.php";

$db=new Database();
$query="SELECT * FROM tbl_user";
$read=$db->select($query);
?>

<table border="1" cellspacing="1" cellpadding="1" width="100%">
       <tr>
           <th>SL</th>
           <th>Name</th>
           <th>Email</th>
           <th>Skill</th>
           <th>Action</th>
       </tr>
       <?php
       $sl=1;
       if($read)
       {
            while($row=$read->fetch_assoc())
            {
            ?>
                <tr>
                    <td><?php echo $sl++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['skill'];?></td>
                    <td>
                        <a href="edit.php?eid=<?php echo $row['id'];?>">Edit</a>||
                        <a href="delete.php?did=<?php echo $row['id'];?>">Delete</a>
                    </td>
                </tr>
        <?php 
            }
        }
        else{ ?>
        <div style="color: red;">No Data Found</div>
        <?php } ?>
</table>

<?php
include "inc/footer.php";
?>