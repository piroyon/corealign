<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP">
<head>
<META http-equiv="content-type" CONTENT="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>

<style type="text/css">
#tiptext {
	position: absolute;
	z-index:2;
	padding:2px;
	font-size: 9pt;
	background-color: #2E8B57;
	color: white;
	font-family: 'Tahoma';
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
function MouseXY(NNevent){
	NNX = NNevent.pageX;
	NNY = NNevent.pageY;
}
window.onmousemove = MouseXY;/* himajin.moo.jp */
// --></script>
</head>

<body>

<div ID='tiptext' STYLE='display: none;'></div>

<?php
if(isset($_GET['tabid'])){
	echo '<div id="showimage"> ';
	$tabid = $_GET['tabid'];
	if  (ereg('tax', $tabid)) {
	$imagesrc = "images/" . $tabid . ".findcore.cmprloc.png";
	echo '<IMG name="img" alt=" " id="cmprloc" usemap="map_1" ';
	echo '" src="';
	echo "$imagesrc";
	echo '">';
	echo '<map name="map_1" id="map_1">';
	if (file_exists("maps/$tabid.findcore.cmprloc.map")) {
		$contents = @file_get_contents("maps/$tabid.findcore.cmprloc.map");
		echo $contents;
		echo '</map>';
	}
	} else {
		echo '<h3>Bad id</h3>';
	}
} else {
	echo  '<div id="showimage"><h3>Please set id</h3>';
}	echo "</div>";
?>

<br><br>
 </body>
 </html>