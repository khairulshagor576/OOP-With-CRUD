<?php
include "inc/header.php";
include "database/config.php";
include "database/database.php";

$db=new Database();
$id=$_GET['eid'];

$query="SELECT * FROM tbl_user WHERE id={$id}";
$read=$db->select($query);
$row=$read->fetch_assoc();

if(isset($_POST['submit']))
{
  $name=mysqli_real_escape_string($db->link,$_POST['name']);
  $email=mysqli_real_escape_string($db->link,$_POST['email']);
  $skill=mysqli_real_escape_string($db->link,$_POST['skill']);

  if($name == '' || $email == '' || $skill == '')
  {
    $error = "Field must not be Empty !!";
   } 
   else 
   {
    $sql="UPDATE tbl_user SET name='{$name}',email='{$email}',skill='{$skill}' WHERE id={$id}";
    $result=$db->update($sql);
   }
}

?>
<?php
// if($read)
// {
//   while($row=$read->fetch_assoc())
//   {
?>
<form action="edit.php?eid=<?php echo $row['id']; ?>" method="post">
    <table width="100%">
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
        <!-- <td><input type="hidden" name="name" value="<?php echo $row['id'];?>"/></td> -->
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="<?php echo $row['email'];?>"/></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" value="<?php echo $row['skill'];?>"/></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" value="Update"/>
            <input type="reset" Value="Cancel" />
        </td>
    </tr>
    </table>
</form>
<?php
//   }
// }
?>
<a href="index.php">Go Back</a>
<?php
include "inc/footer.php";
?>