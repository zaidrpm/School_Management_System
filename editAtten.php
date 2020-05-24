<?php
require 'base.php';
$class=$_SESSION['class'];
$sec=$_SESSION['sec'];
$uid=$_GET['uid'];
$date=$_GET['date'];
$state=$_GET['state'];
$month=$_GET['month'];
$tempi='';
$tempf='';
if($date<10)
{
if($state==1)
{
$tempi="0$date".'A';
$tempf="0$date".'P';
}
else
{
$tempi="0$date".'P';
$tempf="0$date".'A';
}
}
else
{
if($state==1)
{
$tempi="$date".'A';
$tempf="$date".'P';
}
else
{
$tempi="$date".'P';
$tempf="$date".'A';
}
}
$sql="update Attendence set $month=REPLACE($month,'$tempi','$tempf') where uid=$uid";
if($conn->query($sql)!==false && $conn->affected_rows>0 )
echo "$uid,$date,$state,1";
else
echo "$uid,$date,$state,0";
$conn->close();
?>
