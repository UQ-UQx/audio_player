<!DOCTYPE html>
<html lang="en">
  <head>
	  <meta charset="utf-8">
	  <title>title</title>
   
	  <link rel="stylesheet" type="text/css" href="www/css/bootstrap.min.css"></link>
	  <link rel="stylesheet" type="text/css" href="www/css/bootstrap-theme.min.css"></link>
	  <link rel="stylesheet" type="text/css" href="www/css/font-awesome.min.css"></link>
	  <link rel="stylesheet" type="text/css" href="www/css/jquery-ui.min.css"></link>
	
	  <script type="text/javascript" src="www/js/jquery-1.11.3.min.js"></script>
	  <script type="text/javascript" src="www/js/jquery-ui.min.js"></script>
	  <script type="text/javascript" src="www/js/bootstrap.min.js"></script>

  </head>
  <body>
	  <div id="highlighttime" class="audioplayer" data-audiofile="audio.mp3" data-hidetimeline="false" data-showsubtitles="false" ></div>
	  <div class='audiohighlight'>
		  <p><span class="highlight" data-starttime="0" data-endtime="5">This is a test of how audio highlighting can work</span></p>
		  <p>
		    <span class="highlight" data-starttime="5" data-endtime="10">Its not surprising how easy this is,</span>
		    <span class="highlight" data-starttime="10" data-endtime="15">but it is surprising that it works first time</span><br/>
		    <span class="highlight" data-highlightsq="[[2,4],[7,9],[11,13],[5,6]]">Yes, I agree.</span>
		  </p>
	  </div>
   
	  <script type='text/javascript' src='highlight.js'></script>
	  <script type='text/javascript' src='load.js'></script> 
  </body>
</html>