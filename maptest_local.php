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
</style>
<script type="text/javascript"><!--
b_color="white";      
f_size="9"; 
f_color="#363636"; 
set_x=10; 
set_y=-3;

document.write("<div ID='tiptext' STYLE='position:absolute;z-index:2;padding:2px;");
document.write("font-size:"+f_size+"pt; background-color:"+b_color+";"+"color:"+f_color+";");
document.write("display:none'></div>");
function showname(settxt){
divid="tiptext";
if(document.all){
     d_div=document.all(divid);
     rx = event.clientX + document.body.scrollLeft +set_x;
     ry = event.clientY + document.body.scrollTop +set_y;
}else{
     d_div=document.getElementById(divid);
     rx = NNX  + set_x;
     ry = NNY + set_y;
}
if(settxt){
     d_div.style.display="block";
     d_div.style.left = rx +"px";
     d_div.style.top = ry +"px";
     d_div.innerHTML = settxt; 
}else{
     d_div.style.display="none"; 
     d_div.innerHTML = ""; }
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
	$thumheight=$height / 10;
	$thumwidth=$width / 10;
	echo "<style>";
	echo '#showwindow { width: ';
    echo "$thumwidth";
	echo 'px; height: ';
	echo "$thumheight";
	echo 'px; padding: 0.5em; }';
	echo "</style> <div id=\"showimage\" style=\"float:left\"> ";
	echo "<IMG name=\"img\" alt=\"\" id=\"findcore\" usemap=\"#map_1\" width=\"";
	echo "$width";
	echo "\" height=\"";
	echo "$height";
	echo "\" src=\"";
	echo "$imagesrc";
	echo "\">";
	echo "<map name=\"map_1\" id=\"map_1\">";
	$contents = @file_get_contents("maps/$tabid.map");
	echo $contents;
	echo "</map>";
} else {
	echo  '<div id=\"showimage\"> <h3>Please set tabid</h3>';
}
?>
</div>

<div id="showthumbnail" class="a" style="float:left"></div>
<div id="showwindow" class="a" style="float:left; position: absolute; left: 648px; z-index: 2;"><p>window</p></div>
<br><br>
 </body>
 </html>