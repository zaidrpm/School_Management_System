<?php session_start();
$ps=$_POST['paswrd'];
$un=$_POST['name'];

$conn = new mysqli("localhost","root","168866","users");

if ($conn->connect_error)
{
 die("Connection failed: " . $conn->connect_error);
}

$result=$conn->query("select a.*,b.sfname,b.ssname from Info a,schooldata b where username='$un' AND password='$ps' And a.schoolid=b.id");
$conn->close();
if($result===false || $result->num_rows ==0)
{
echo "Login Failed -> Wrong UserName / Password entered ";
}
else if($result->num_rows > 0)
{
$row=$result->fetch_assoc();
$temp=explode(',',$row['AdminOf']);
$_SESSION['sname']=$row['ssname'];
$_SESSION['uid']=$row['uid'];
$_SESSION['sfname']=$row['sfname'];
$_SESSION['db']='n'.$row['schoolid'];
$_SESSION['class']=$temp[0];
$_SESSION['sec']=$temp[1];
header('Location:homepage.php');
}
?>
