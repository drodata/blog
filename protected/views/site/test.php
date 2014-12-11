<h3>Quick Test Page (<code>views/site/test.php</code>)</h3>
<button class="dd">open the dialog</button>

<button id="opener">open the dialog</button>
<div id="dialog" title="Dialog Title">I'm a dialog</div>
 
 <script>
 $( "#dialog" ).dialog({ autoOpen: false });
 $( "#opener" ).click(function() {
   $( "#dialog" ).dialog( "open" );
   });
   </script>
<?php
Yii::app()->clientScript->registerCssFile('/blog/css/jqueryui/flick/jquery-ui.min.css');
Yii::app()->clientScript->registerScriptFile('/blog/js/jquery-ui.latest.js');
?>
 
 <script>
 function popupwindow(url, title, w, h) {
 	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
$('.dd').click(function(event) {
    event.preventDefault();
	popupwindow('http://baidu.com', 'gogo', 600, 300);
		});
   </script>
