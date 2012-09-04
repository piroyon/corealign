<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP">
<head>
<META http-equiv="content-type" CONTENT="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="js/jkl-dumper.js"></script> 
<script type="text/javascript" src="js/jquery.zoomable-1.1.1.js"></script>
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
</style>
</head>

<body>
 
<script type="text/javascript">
	$(document).ready(function(){
		$('input:button').button();
		$('#findcore').zoomable();
		
		//get Real image size
		var imgObj = document.getElementById("findcore");
		imgObj.onload = function() {
			var w = imgObj.width ,
			h = imgObj.height ;
			if ( typeof imgObj.naturalWidth !== 'undefined' ) {  // for Firefox, Safari, Chrome
				w = imgObj.naturalWidth;
				h = imgObj.naturalHeight;
				console.log('hei3='+h);
			} else if ( typeof imgObj.runtimeStyle !== 'undefined' ) {    // for IE
        		var run = imgObj.runtimeStyle;
        		var mem = { w: run.width, h: run.height };  // keep runtimeStyle
        		run.width  = "auto";
        		run.height = "auto";
        		w = imgObj.width;
        		h = imgObj.height;
        		run.width  = mem.w;
        		run.height = mem.h;
 			} else {         // for Opera
       			 var mem = { w: imgObj.width, h: imgObj.height };  // keep original style
       			 imgObj.removeAttribute("width");
       			 imgObj.removeAttribute("height");
       			w = imgObj.width;
        		h = imgObj.height;
        		imgObj.width  = mem.w;
        		imgObj.height = mem.h;
    		}
			imgObj.setAttribute('width', w);
			imgObj.setAttribute('height', h);
		}
  });
 </script>

<h1>jQuery zoomable plugin</h1>
  <p>

    <input type="button" value="+" onclick="$('#findcore').zoomable('zoomIn')" title="Zoom in" />

    <input type="button" value="-" onclick="$('#findcore').zoomable('zoomOut')" title="Zoom out" />

    <input type="button" value="Reset" onclick="$('#findcore').zoomable('reset')" />

  </p>

  <div style="overflow:hidden;width:800px;height:1056px;position:relative;">

<!-- <img src="images/imagemap.png" usemap="#map" id="image" alt="Demo image for zoomable jQuery plugin" />-->
<?php
if(isset($_GET['tabid'])){
	$tabid = $_GET['tabid'];
	$imagesrc = "images/" . $tabid . ".findcore216.sort.png";
	echo "<IMG name=\"img\" alt=\"\" id=\"findcore\" usemap=\"#map_1\" width=\"2400\" height=\"6300\" src=\"";
	echo "$imagesrc";
	echo "\">";
	echo "<map name=\"map_1\" id=\"map_1\">";
	$contents = @file_get_contents("images/$tabid.map");
	echo $contents;
	echo "</map>";
} else {
	echo  '<h3>Please set tabid</h3>';
}
?>

<!--<IMG name="img4" alt="" id="findcore" usemap="#map_1" width="2400" height="6300"  src=<php? $imagesrc ?>>-->


  </div>



 <br />
 <br />
 <br />
 <br />


 </div>

 </div>
 </body>
 </html>