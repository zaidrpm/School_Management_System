<?php
require 'base.php';
$class=$_GET['classs'];
$sec=$_GET['sec'];
$et=$_GET['etype'];
if($conn->query("call rc$class(\"$sec\",\"$et\")")===true)
{
echo "<script>alert('Successful');</script>";
}
else
{
echo "<script>alert('Failed');</script>";
}
$conn->close();
?>
