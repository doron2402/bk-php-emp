function getRss(str)
{

if (str.length==0)
  {
  document.getElementById("ShowRssFeed").innerHTML="Empty";
  return false;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("rss").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","Include/Rss/rss_proxy.php?rss="+str,true);
xmlhttp.send();
}
