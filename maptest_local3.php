<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP">
<head>
<META http-equiv="content-type" CONTENT="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="js/jkl-dumper.js"></script> 
<script type="text/javascript" src="js/jquery.zoomable-1.1.3.js"></script>
<style type="text/css">
.ui-button { 
	display: inline-block; 
	position: relative; 
	padding: 0; 
	margin-right: .1em; text-decoration: none !important; 
	cursor: pointer; 
	text-align: center; 
	zoom: 1; 
	overflow: visible; 
} /* the overflow property removes extra width in IE */
#showimage {
    width: 640px;
    height: 640px;
	overflow: hidden;
	position: relative;
}
#tiptext {
	position: absolute;
	z-index:2;
	padding:2px;
	font-size: 9pt;
	background-color: #2E8B57;
	color: white;
	font-family: 'Tahoma';
}
#nondrag {
	position: absolute;
	z-index:4;
	padding:2px;
	font-size: 8pt;
	background-color: white;
	color: grey;
	font-family: 'Tahoma';
}
.b {
	font-family: 'Tahoma';
	font-size: 8pt; 
	text-align: center; 
	background-color: #9ACD32; 
	border-color: #006400; 
	border-style: solid; 
	float: left; 
	opacity: 0.5; 
	z-index: 2; 
}
</style>

<script type="text/javascript"><!--
set_x=10; 
set_y=-3;


function showname(settxt){
     d_div=document.getElementById("tiptext");
     rx = NNX  + set_x;
     ry = NNY + set_y;
if(settxt){
     d_div.style.display="block";
     d_div.style.left = rx +"px";
     d_div.style.top = ry +"px";
     d_div.innerHTML = settxt;
}else{
     d_div.style.display="none"; 
     d_div.innerHTML = ""; 
}
}
function showname_drag(settxt){
	d_drag=document.getElementById("nondrag");
     rx = NNX  + set_x;
     ry = NNY + set_y;
if(settxt){
	 d_drag.style.display="block";
     d_drag.style.left = rx +"px";
     d_drag.style.top = ry +"px";
     d_drag.innerHTML = settxt; 
}else{
	 d_drag.style.display="none"; 
     d_drag.innerHTML = ""; 
	 }
}
function MouseXY(NNevent){
	NNX = NNevent.pageX;
	NNY = NNevent.pageY;
}
window.onmousemove = MouseXY;/* himajin.moo.jp */
// --></script>
</head>

<body>
 
<script type="text/javascript">
	$(document).ready(function(){
		$('input:button').button();
		$('#findcore').zoomable();
  });
 </script>

<div ID='tiptext' STYLE='display: none;'></div>
<div ID='nondrag' STYLE='display: none;'></div>

<p>

    <input type="button" value="+" onclick="$('#findcore').zoomable('zoomIn')" title="Zoom in" />

    <input type="button" value="-" onclick="$('#findcore').zoomable('zoomOut')" title="Zoom out" />

    <input type="button" value="Reset" onclick="$('#findcore').zoomable('reset')" />

</p>
	  
<?php
if(isset($_GET['tabid'])){
	$tabid = $_GET['tabid'];
	$imagesrc = "images/" . $tabid . ".findcore.sort.png";
	$size = getimagesize($imagesrc);
	$height=$size[1];
	$width=$size[0];
	$thumheight=$height / 15;
	$thumwidth=$width / 15;
	echo "<style>";
	echo '.a { width: ';
    echo "$thumwidth";
	echo 'px; height: ';
	echo "$thumheight";
	echo 'px; margin: 10px; }';
	echo '</style> <div id="showimage" style="float:left;"> ';
	echo '<IMG name="img" alt=" " id="findcore" usemap="#map_1" width="';
	echo "$width";
	echo '" height="';
	echo "$height";
	echo '" src="';
	echo "$imagesrc";
	echo '">';
	echo '<map name="map_1" id="map_1">';
	$contents = @file_get_contents("maps/$tabid.map");
	echo $contents;
	echo '</map>';
} else {
	echo  '<div id=\"showimage\"> <h3>Please set tabid</h3>';
}	echo "</div>";
	echo '<div id="showthumbnail" class="a" style="float: left; background-color: #DCDCDC;">';
	echo '<div id="showwindow" class="b" onmouseover="showname_drag(\'Sorry, Im not draggable and zoomable\')" onmouseout="showname_drag(\'\')" style="position: relative; left: 0px; top: 0px; height: ';
	echo "$thumwidth";
	echo 'px; width: ';
	echo "$thumwidth";
	echo 'px; \">';
	echo 'window</div></div>';
?>

<br><br>
 </body>
 </html>