<html>
<head>
<title>Online Image Map Editor - Example 1</title>

<link rel="stylesheet" href="map/imgmap.css" type="text/css">
<link rel="stylesheet" href="map/js/colorPicker.css" type="text/css" />
<!--[if gte IE 6]>
<script language="javascript" type="text/javascript" src="../excanvas.js"></script>
<![endif]-->
<script language="javascript" type="text/javascript" src="lib/js/jquery.1.8.2.js"></script>
<script language="javascript" type="text/javascript" src="map/js/jquery.colorPicker.js"></script>
</head>
<body>
<p style="font-size: 12px; font-weight: bold">
Example 1 shows how to use the imgmap component in a complete imagemap editor application. This example is 
functionally equivalent to the online editor found at
<a href="http://www.maschek.hu/imagemap/imgmap">http://www.maschek.hu/imagemap/imgmap</a>.<br/>
To use the uploader component ("An image on your computer") you will need to open the example from a php-enabled webserver.

</p>
	<form id="img_area_form">
		<fieldset>
			<legend>
				<a onclick="toggleFieldset(this.parentNode.parentNode)">Select source</a>
			</legend>
			<div>
                <?php include("../../const.php"); ?>
                <?php $v_image_file =  (isset($_GET['txt_image']) ? $_GET['txt_image'] : ''); ?>
				<div class="source_desc">An image on the Internet:</div>
				<div class="source_url"><input type="txt" id="source_url2" value="<?php echo RESOURCE_URL. $v_image_file; ?>"></div>
				<a href="javascript:gui_loadImage(document.getElementById('source_url2').value)" class="source_accept">accept</a><br/>
			</div>
		</fieldset>
		<fieldset>
			<legend>
				<a onclick="toggleFieldset(this.parentNode.parentNode)">Image map areas</a>
			</legend>
			<div style="border-bottom: solid 1px #efefef">
			<div id="button_container">
				<!-- buttons come here -->
				<img src="map/add.gif" onclick="myimgmap.addNewArea()" alt="Add new area" title="Add new area"/>
				<img src="map/delete.gif" onclick="myimgmap.removeArea(myimgmap.currentid)" alt="Delete selected area" title="Delete selected area"/>
				<img src="map/zoom.gif" id="i_preview" onclick="myimgmap.togglePreview();" alt="Preview image map" title="Preview image map"/>
				<img src="map/html.gif" onclick="gui_htmlShow()" alt="Get image map HTML" title="Get image map HTML"/>
				<label for="dd_zoom">Zoom:</label>
				<select onchange="gui_zoom(this)" id="dd_zoom">
				<option value='0.25'>25%</option>
				<option value='0.5'>50%</option>
				<option value='1' selected="1">100%</option>
				<option value='2'>200%</option>
				<option value='3'>300%</option>
				</select>
				<label for="dd_output">Output:</label> 
				<select id="dd_output" onchange="return gui_outputChanged(this)">
				<option value='imagemap'>Standard imagemap</option>
				<option value='css'>CSS imagemap</option>
				<option value='wiki'>Wiki imagemap</option>
				</select>
				<div>
					<a class="toggler toggler_off" onclick="gui_toggleMore();return false;">More actions</a>
					<div id="more_actions" style="display: none; position: absolute;">
						<div><a href="" onclick="toggleBoundingBox(this); return false;">&nbsp; bounding box</a></div>
						<div><a href="" onclick="return false">&nbsp; background color </a><input onchange="gui_colorChanged(this)" id="color1" style="display: none;" value="#ffffff"></div>
					</div>
				</div>
			</div>
			<div style="float: right; margin: 0 5px">
				<select onchange="changelabeling(this)">
				<option value=''>No labeling</option>
				<option value='%n' selected='1'>Label with numbers</option>
				<option value='%a'>Label with alt text</option>
				<option value='%h'>Label with href</option>
				<option value='%c'>Label with coords</option>
				</select>
			</div>
			</div>
			<div id="form_container" style="clear: both;">
			<!-- form elements come here -->
         	</div>
		</fieldset>
		<fieldset>
			<legend>
				<a onclick="toggleFieldset(this.parentNode.parentNode)">Image</a>
			</legend>
			<div id="pic_container">
			</div>			
		</fieldset>
		<fieldset>
			<legend>
				<a onclick="toggleFieldset(this.parentNode.parentNode)">Status</a>
			</legend>
			<div id="status_container"></div>
		</fieldset>
		<fieldset id="fieldset_html" class="fieldset_off">
			<legend>
				<a onclick="toggleFieldset(this.parentNode.parentNode)">Code</a>
			</legend>
			<div>
			<div id="output_help">
			</div>
			<textarea id="html_container"></textarea></div>
		</fieldset>
	</form>

<script type="text/javascript" src="imgmap.js"></script>
<script type="text/javascript" src="map/default_interface.js"></script>
</body>
</html>
