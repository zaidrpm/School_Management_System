function per()
{
var l=document.getElementById("main").rows.length;
var tm=100;
var i=1;
var total=0;
var f;var z;
var temp;
var pass=(.4*tm);

for(i=1;i<l-1;i++)
{
temp=parseInt(document.getElementById("main").rows[i].cells[1].innerHTML);
if(temp<pass)
{
document.getElementById("main").rows[i].cells[1].style.fontWeight="bold";
document.getElementById("main").rows[i].cells[1].style.color="red";
}
}
}
