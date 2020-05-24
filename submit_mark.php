<?php
require 'base.php';
$subject=$_POST['subject'];
$class=$_POST['class'];
$sec=$_POST['sec'];
$exam=$_POST['exam'];
$tuid=$_SESSION['uid'];
$jsondata=$_POST['jsondata'];
if($conn->query("Delete from c$class where Etype=$exam and Subject=$subject and uid in (select uid from Names where class=$class and sec='$sec')")===false)
{
die("Error");
}
$jdata=json_decode($jsondata);
$stmt=$conn->prepare("insert into c$class values (?,$exam,$subject,?,$tuid)");
foreach($jdata as $key => $value)
{
$stmt->bind_param("ii",$key,$value);
if($stmt->execute()===false)
echo "Failed-$key";
else
echo "Success";
}
$stmt->close();
$conn->close();
?>

