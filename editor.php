<?php
require 'base.php';
sleep(3);
$uuid=$_SESSION['uid'];
$uid=$_GET['uid'];
$class=$_GET['class'];
$etype=$_GET['etype'];
$subject=$_GET['subject'];
if(isset($_GET['value']))
{
$value=$_GET['value'];
$sql="update c$class set Mob=$value where uid=$uid and Etype=$etype and Subject=$subject and rcb=$uuid limit 1";
$result=$conn->query($sql);
if($result===true && $conn->affected_rows >0)
echo "Done";
else if($result===true && $conn->affected_rows==0)
echo "Permission Denied";
else
echo "Failed";
}
else
{
$sql="delete from c$class where uid=$uid and Etype=$etype and Subject=$subject and rcb=$uuid limit 1";
$result=$conn->query($sql);
if($result===true && $conn->affected_rows > 0)
echo "Deleted Successfully";
else if($result===true && $conn->affected_rows == 0)
echo "Permission Denied";
else
echo "Failed-".$conn->error;
}
$conn->close();
?>

