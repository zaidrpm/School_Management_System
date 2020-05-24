<?php
if(isset($_GET['name']) && isset($_GET['pno']))
{
require 'base.php';
$class=$_SESSION['class'];
$sec=$_SESSION['sec'];
$name=$_GET['name'];
$pno=$_GET['pno'];
$sql="call insert_name($class,'$sec','$name','$pno')";
if($conn->query($sql)===true)
$msg='<h1><x>S</x>uccess!</h1>';
else
$msg='<h1>Failed</h1>';
}
else
require 'security_only.php';
?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/regis.css" type="text/css" />
<style>
table#cen {
display:block;
text-align:left;
border:1px solid black;
width:380px;
padding-left:30px;
border-radius:10px;
border:3px solid #ed4845;
box-shadow:10px 10px 5px #cccccc;
padding-bottom:5px;
border-spacing:0px;
}
td {
border:0px solid white;
}
</style>
</head>
<body>
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
</br>
<form method='GET' Action='regis.php'>
<table id='cen'>
<tr><td><?php if(isset($msg)) echo $msg;?></td><tr>
<tr>
<td><h1><x>N</x>ame:</h1></td>
<td><input type='text' size='20' name='name'></td>
</tr>
<tr>
<td><h1><x>P</x>hone No</h1></td>
<td><input type=text name='pno'></td>
</tr>
<tr>
<td colspan='2'><input type='submit' value='Submit' size='30'>
</td>
</tr></table></form>
</br>
</div></center></br></div>
</body>
</html>
