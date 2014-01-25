<?php
// Set your return content type
header('Content-type: application/xml');

$rss = $_GET['rss'];
switch ($rss)
{
    case "news":
        $xml = 'http://www.ynet.co.il/Integration/StoryRss2.xml';
		$t = '<a href="http://www.ynet.co.il/home/0,7340,L-184,00.html" target="_blank">חדשות - Ynet</a>';
        break;
    case "gossip":
        $xml = "http://rcs.mako.co.il/rss/entertainment-celebs.xml";
		$t = '<a href="http://www.mako.co.il/entertainment" target="_blank">בידור - Mako</a>';
        break;
    case "sport":
        $xml = "http://www.one.co.il/cat/coop/xml/rss/newsfeed.aspx";
		$t = '<a href="http://www.one.co.il" target="_blank">ספורט - One</a>';
        break;
    default :
        $xml = 'http://www.ynet.co.il/Integration/StoryRss2.xml';
		$t = '<a href="http://www.ynet.co.il/home/0,7340,L-184,00.html" target="_blank">חדשות - Ynet</a>';
        break;
}


$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

echo '<br /><p style="margin-right:0px; margin-left:15px; color:red;">'.$t.'</p><marquee behavior="scroll" direction="up" scrollamount="1"><div id="rss" style="padding-left:10px;">';

//get and output "<item>" elements
$x= $xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=9; $i++)
  {

  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  echo ("<li><a target=\"_blank\" style=\"margin-top:5px; margin-right:0px; \" href='" . $item_link. "'>" . $item_title . "</a>");

  //echo ($item_desc . "");
 echo '</li><br/>';
  }
  
echo '</marquee></div></p>';
?>
