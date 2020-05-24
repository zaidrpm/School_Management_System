<?php require 'base.php';
$subject=$_GET['subject'];
$class=$_GET['classs'];
$sec=$_GET['sec'];
$exam=$_GET['exam'];
$tmark=$_GET['tmark'];
?>
<html>
<head>
<script>
var tmark='<?php echo $tmark;?>';
</script>
<title>Mark</title>
<link rel='stylesheet' href='css/Enter_Marks.css' type='text/css' />
<script src='java/Enter_Marks.js'></script>
</head>
<body onload='onl()'>
Enter 'A' if absent</br>
Enter 'M' if Medical</br>
Press + or tab to jump to next row 
<table id='main'>
<tr>
<th>Roll</th>
<th>Name</th>
<th>Marks</th>
</tr>
<?php
$result=$conn->query("Select uid,roll,Name from Names where class=$class and sec='$sec' order by roll");
if($result===false)
die('Err');
$z=0;
while($row=$result->fetch_assoc())
{
echo '<tr><td>'.$row['roll'].'</td><td>'.$row['Name'].'</td><td><input type="text" class="num" value="0" onkeyup="chk(this)" onclick="setz('.$z.')"  data-uid="'.$row['uid'].'"></td></tr>';
++$z;
}
?>
</table>
<form Action='submit_mark.php' method='post' onsubmit="return b()" target='_blank'>
<input style='display:none;' type='text' name='jsondata' id='jsondata'>
<input style='display:none;' type='text' name='class' value='<?php echo $class;?>'>
<input style='display:none;' type='text' name='sec' value='<?php echo $sec;?>'>
<input style='display:none;' type='text' name='exam' value='<?php echo $exam;?>'>
<input style='display:none;' type='text' name='subject' value='<?php echo $subject;?>'>
<input type='submit' value='Submit'>
</body>
</html>
