<?php
require 'base.php';
$class=$_SESSION['class'];
$sec=$_SESSION['sec'];
$uid=$_GET['uid'];
if(isset($_GET['new_name']))
{
$name=$_GET['new_name'];
$sql="select count(Name) as xx from Names where Name='$name' AND class=$class AND sec='$sec'";
$result=$conn->query($sql);
if($result===false)
{
//status,error msg,uid
die("0,Error");
}
$row=$result->fetch_assoc();
$result->close();
if($row['xx']>0)
{
echo "0,Same Name exists";
}
else
{
$sql="update Names set Name='$name' where uid=$uid";
if($conn->query($sql)===true)
{
echo "1,Success,$uid,$name";
}
else
{
echo "0,Error";
}
}
}
else
{
if($conn->query("delete from Names where uid=$uid")===true)
{
echo "2,Deleted Successfully,$uid";
}
else
{
echo "Failed";
}
}
$conn->close();
?>
