<?php
include "inc/header.php";
include "database/config.php";
include "database/database.php";
$db=new Database();
$id=$_GET['did'];

$sql="DELETE FROM tbl_user WHERE id={$id}";
$result=$db->delete($sql);

?>