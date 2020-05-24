var z=0;
function setz(e)
{
z=e;
}
function onl()
{
document.getElementsByClassName('num')[z].focus();
document.getElementsByClassName('num')[z].select()
}
function chk(t)
{
a=t.value;
len=a.length-1;
if(a.charAt(len)=='+')
{
t.value=a.substr(0,len);
document.getElementsByClassName('num')[++z].focus();
document.getElementsByClassName('num')[z].select()
}
}
var inval=-1;
function b()
{
var d={};
var obj=document.getElementsByClassName('num');
var l=obj.length;
var val,tem;
for(i=0;i<l;i++)
{
if(inval>-1)
{
obj[inval].style.border='0px solid black';
inval=-1;
}
val=obj[i].value;
if(val=='a' || val=='A')
{
tem=obj[i].getAttribute('data-uid');
d[tem]=-1;
}
else if(val=='M' || val=='m')
{
tem=obj[i].getAttribute('data-uid');
d[tem]=-2;
}
else if(!(isNaN(val)))
{
tem=obj[i].getAttribute('data-uid');
val=val/tmark*100;
d[tem]=val;
}
else
{
if(val.length==0)
alert("1 field is left empty");
else
alert("Invalid Input -"+val);
obj[i].style.border='4px solid red';
inval=i;
return false;
break
}
}
st=JSON.stringify(d);
document.getElementById('jsondata').value=st;
return true;
}
