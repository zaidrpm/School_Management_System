<?php
require 'security_only.php';
$conn=new mysqli("localhost","mz","168866","users");
if ($conn->connect_error)
{
 die('Connection failed');
}
$uname=$_POST['uname'];
$opswd=$_POST['opswd'];
$npswd=$_POST['npswd'];
$rnpswd=$_POST['rnpswd'];
if($rnpswd != $npswd)
{
die('Unmatched Password');
}
$result=$conn->query("update Info set password='$npswd' where password='$opswd' And username='$uname'");
if($result===true && $conn->affected_rows >0)
{
$out='Successfull';
}
elseif($result===true && $conn->affected_rows==0)
{
$out='Invalid username / Old Password';
}
else
{
$out='Failed';
}
$conn->close();
echo $out;
?>
