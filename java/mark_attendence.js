var xu;var oopt;
function sms(obj)
{
xu=obj.innerHTML;
if(xu=='A')
{
obj.innerHTML="P";
}
if(xu=='P')
{
obj.innerHTML="A";
}
}

function calcu()
{
var d={};
var za=document.getElementById('main');
var xs=za.rows.length-1;
var i=1;
var val,xv;
for(i=1;i<=xs;i++)
{
val=za.rows[i].cells[2].innerHTML;
xv=za.rows[i].cells[0].innerHTML;
d[xv]=val;
}
document.getElementById("data").value=JSON.stringify(d);
return true;
}

function mall()
{
var col=document.getElementById('mak').innerHTML;
if(col=='All P')
{
oopt='P';
document.getElementById('mak').innerHTML='All A';
}
else if(col=='All A')
{
oopt='A';
document.getElementById('mak').innerHTML='All P';
}
var za=document.getElementById('main');
var xs=za.rows.length-1;
var f="0";
var i=1;
for(i=1;i<=xs;i++)
{
za.rows[i].cells[2].innerHTML=oopt;
}
}
