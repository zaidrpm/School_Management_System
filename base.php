<?php session_start();
if(!(isset($_SESSION['sname']) && isset($_SESSION['uid'])))
{
die("You Are Not Logged In");
}
$school=$_SESSION['db'];
$conn=new mysqli("localhost","mz","168866",$school);
if ($conn->connect_error)
{
 die("Connection failed: " . $conn->connect_error);
}
?>
