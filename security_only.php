<?php session_start();
if(!(isset($_SESSION['sname']) && isset($_SESSION['uid'])))
{
die("You Are Not Logged In");
}
?>
