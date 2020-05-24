<?php
require '../base.php';
if(!(isset($_GET['class']) && isset($_GET['roll']) && isset($_GET['sec'])))
{
die("Error:Invalid Arguements");
}
?>
<html>
<head>
<title>class Mark</title>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/report.css" type="text/css" />
</head>
<body onload="per()">
<div id="main2">
<?php
echo "<p id='headerr'>".$_SESSION['sfname']."</p>";
$class=$_GET['class'];
$roll=$_GET['roll'];
$sec=$_GET['sec'];
$sql="select a.Name,a.rank,b.* from Names a,Attendence b where a.roll=$roll and a.class=$class and a.sec='$sec' and a.uid=b.uid limit 1";
$result=$conn->query($sql);
if($result===false)
{
die("Some Error occured, Please retry.");
}
$row=$result->fetch_assoc();
echo "<table id='head' cellspacing='0' style='border:2px solid black'><tr><td colspan='3'class='he' style='width:201.1mm;'>Name:&nbsp ".$row['Name']."</td></tr><tr><td class='he'>Class: $class</td><td class='he'>Sec: $sec</td><td class='he'>Roll: $roll</td></tr><tr><th colspan='3' class='he'><p align='center'>Annual Report</p></th></tr></table></br></br>"; 
//$class="c".$class;
$uid=$row['uid'];
$rank=$row['rank'];
//Starting calculating Attendence
$month_name=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece');
$tdays=0;
$present=0;
for($i=0;$i<12;$i++)
{
$temp=$row[$month_name[$i]];
$l=strlen($temp);
if($l==0)
continue;
for($j=0;$j<$l;$j++)
{
if($temp[$j]=='P')
{
$present+=1;
$tdays+=1;
}
else
{
if($temp[$j]=='A')
$tdays+=1;
}
}
}
if($tdays>0)
$attendence=round(($present*100/$tdays),1);
else
$attendence='Err';
unset($month_name);
unset($temp);
$result->close();
//End of attendence
$sql="select id,Name from Eas where identifier=1";
$result=$conn->query($sql);
if($result===false)
die("exam error");
$row_exam=array(array(),array());
$temp=$result->num_rows;
while($row=$result->fetch_assoc())
{
$row_exam[0][]=$row['id'];
$row_exam[1][]=$row['Name'];
}
$result->close();
$sql="select a.Name as subject,b.Subject as subcode, b.Mob, b.Etype from Eas a,c$class b where a.id=b.Subject and b.uid=$uid order by  b.Subject,b.Etype";
$result=$conn->query($sql);
if($result===false)
{
die("Error, Please relogin".$conn->error);
}
?>
<table style='width:207mm;' cellspacing='0' id="main">
<tr>
<th style='border-left:3px solid black;border-top:3px solid black;'>Subject</th>
<?php 
for($j=0;$j<$temp;$j++)
echo '<th style="border-top:3px solid black">'.$row_exam[1][$j].'</th>';
?>
<th style='border-left:3px solid black;border-top:3px solid black;'>Average</th>
</tr>
<?php
$row=$result->fetch_assoc();
$t_attained=0;
$t_mark=0;
while($row)
{
echo '<tr>';
echo '<th style="border-left:3px solid black;">'.$row['subject'].'</th>';
$subcode=$row['subcode'];
for($i=0;$i<$temp;$i++)
{
if($row['subcode']==$subcode && $row['Etype']==$row_exam[0][$i])
{
echo '<td>'.$row['Mob'].'</td>';
$row=$result->fetch_assoc();
}
else
echo '<td>NA</td>';
}
echo '<td>-11</td>';
echo '</tr>';
}
?>
</table>
<table id="lft" border='1'>
<tr>
<td class='rtitle'>Percentage</td>
<td rowspan="3" class="lll" style='border-top-width:1px;'>&nbsp</td>
</tr>
<tr><td class="jjj"></td></tr><tr><td class="hhh"></td></tr><tr>
<td width="100%" class='rtitle'>Attendence</td>
<td rowspan="3" class="lll">
<?php
echo "$attendence<xyz>%</xyz>";
?>
</td></tr>
<tr><td class="jjj">&nbsp</td></tr><tr><td class="hhh">&nbsp</td></tr>
<tr><td class='rtitle'>Rank</td><td rowspan="3" class="lll"><?php echo $rank;?></td></tr>
<tr><td class="jjj">&nbsp</td></tr><tr><td class="hhh">&nbsp</td></tr>
</table>
<table id="cmnt" border="4" cellspacing="0">
<tr><td style="width:93mm;text-align:left;padding-bottom:0px;"><h2>Comment:</h2></td></tr><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr></table>
<div id="lop">Teachers Sign:_________________________ </br></br></br>Parents Sign:___________________________</div>
</div>
</body>
</html>
