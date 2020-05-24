<?php
require 'base.php';
$c=$_SESSION['class'];
$s=$_SESSION['sec'];
if(($conn->query("call sort($c,'$s')"))===false)
echo 'Failed!';
else
echo 'Success!';
?>
