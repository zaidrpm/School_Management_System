<?php require 'base.php';
$conn->close();
?>
<html>
<head>
<link rel="stylesheet" href="css/hp.css" type="text/css" />
<script src="java/homepage.js"></script>
</head>
<body onload="fas()">
<div id="bg">
<div id ='nav'><a href='http://mega/homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
<h1><x>C</x>lass Management :</h1>
<b>. </b><a href='mark_attendence.php'>Mark Attendence</a></br>
<b>. </b><a href='name_list-h.php'>Show Name List</a></br>
<b>. </b><a href='class_atten-h.php'>Show Class Attendence</a></br>
<b>. </b><a href='regis.php'>Register Students</a></br>
<b>. </b><a onclick='sor()'>Sort Name List </a></br>
</br><hr>
<h1><x>V</x>iew :</h1>
<b>. </b><a href='class_mark-h.php'>Show Mark List</a></br>
<b>. </b><a href='smeb-h.php'>Show Mark Per Student Per Exam</a></br>
<b>. </b><a href='report-h.php'>Report Card</a></br>
<b>. </b><a onclick="sname()">Show Teach. Name from uid</a></br>
</br><hr>
<h1><x>R</x>ecord :</h1>
<b>. </b><a href='Enter_Marks-h.php'>Enter Marks</a></br>
</br><hr>
<h1><x>U</x>ser :</h1>
<b>. </b><a href='reset_pswd-h.php'>Change Password</a></br>
<b>. </b><a href='logout.php'>Logout</a></br>
</br><hr>
<a href="mysite.htl"><p id='mmm'><u><z>M</z>z-<z>T</z>ech</u>&nbsp&nbsp&nbsp</p></a>
</div></center></br></div>
</body>
</html>
