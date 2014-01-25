<?php
Header("content-type: application/x-javascript");

$query = "SELECT * FROM Radio;";
$result = mysql_query($query);

?>

function getStation(station)
{
    var radio;
    switch (station)
    {
<? while ($row = mysql_fetch_object($result))
    {?>
            case <?=$row->Id;?>:
                radio = "<?=$row->Link;?>";
                break;
  <? } ?>
            defualt:
            radio = "http://locator.3dcdn.com/glz/glglzradio/300/200/radio.html";
            break;
     }
window.open(radio,station, 'width=300,height=200');
}
    
    
?>