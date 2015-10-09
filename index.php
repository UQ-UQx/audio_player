<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Audio Player</title>	
	<script src="build/jquery.js"></script>	
	<script src="build/mediaelement-and-player.min.js"></script>
	<link rel="stylesheet" href="build/mediaelementplayer.css" />
	<script src="videosub.js"></script>
	<style>
		
		html{
			
			padding-top: 10px !important;
		}
		
	</style>
</head>
<body>
<div class='player'>
	<?php
		$el_name = "";
		$custom_width = false;
		$audiofile = '';
		$subtitles = '';
		$autoplay = '';
		$width = "100%";
		$showtimeline = true;
		$playonly = false;
		$showsubtitles = true;
		if(isset($_GET['element'])) {
			$el_name = $_GET['element'];
		}
		if(isset($_POST['launch_presentation_return_url'])) {
			//Add Https:// if using on edX Platform
			$audiofile = $_POST['custom_audiofile'];
			if(isset($_POST['custom_subtitles'])) {
				$subtitles = 'https://'.$_POST['custom_subtitles']; 
			}
			if(isset($_POST['custom_autoplay']) && $_POST['custom_autoplay'] == 'true') {
				$autoplay = 'autoplay="true"';
			}
			if(isset($_POST['custom_hidetimeline']) && $_POST['custom_hidetimeline'] == 'true') {
				$showtimeline = false;
				if(isset($_POST['custom_subtitles'])) {
					$width = "210px";
				} else {
					$width = "180px";
				}
			}
			if(isset($_POST['custom_width'])) {
				$width = $_POST['custom_width'];
			}
			if(isset($_POST['custom_playonly']) && $_POST['custom_playonly'] == 'true') {
				$playonly = true;
			}
			if(isset($_POST['custom_showsubtitles']) && $_POST['custom_showsubtitles'] == 'false') {
				$showsubtitles = false;
			}
		} else {
			$audiofile = str_replace(' ', '+',$_GET['audiofile']);
			if(isset($_GET['subtitles'])) {
				$subtitles = 'https://'.$_GET['subtitles']; 
			}
			if(isset($_GET['autoplay']) && $_GET['autoplay'] == 'true') {
				$autoplay = 'autoplay="true"';
			}
			if(isset($_GET['hidetimeline']) && $_GET['hidetimeline'] == 'true') {
				$showtimeline = false;
				if(isset($_GET['subtitles'])) {
					$width = "210px";
				} else {
					$width = "180px";
				}
			}
			if(isset($_GET['width'])) {
				$width = $_GET['width'];
			}
			if(isset($_GET['playonly']) && $_GET['playonly'] == 'true') {
				$playonly = true;
			}
			if(isset($_GET['showsubtitles']) && $_GET['showsubtitles'] == 'false') {
				$showsubtitles = false;
			}
		}
		$extra = "'current','duration','tracks','volume'";
		if($playonly) {
			$extra = "";
			$width = "26px";
			$showtimeline = false;
		}
	?>
	<audio id="player2" src="<?php echo $audiofile; ?>" type="audio/mp3" <?php echo $autoplay;?> controls="controls" style="width:<?php echo $width; ?>;position:relative;">	
		<?php
			if($subtitles != '' && $showsubtitles) {
		?>
					<track kind="subtitles" src="subtitles.php?url=<?php echo $subtitles; ?>" mode="showing" srclang="en" />	
		<?php
			}	
		?>
	</audio>	
	<div id="captionBar"></div>
</div>
<script>


var player = $('#player2').mediaelementplayer({
	features: [
		'playpause',
		<?php if($showtimeline) { echo "'progress',"; } ?>,
		<?php echo $extra; ?>
	],
	startLanguage: 'en'
});



window.addEventListener( "message",
function (e) {
	var player = $('#player2');
	//if(e.origin !== 'https://edge.edx.org' && e.origin !== 'https://studio.edge.edx.org' && e.origin !== 'https://courses.edx.org' && e.origin !== 'https://edx.org' && e.origin !== 'https://studio.edx.org'){ alert("Bad domain"); return; } 
	if(e.data.action == 'play') {
		player.each(function(){this.player.play()});
	} else if (e.data.action == 'pause') {
		player.each(function(){this.player.pause()});
	} else if (e.data.action == 'skip') {
		player.each(function(){console.log(this.player);this.player.setCurrentTime(e.data.time);});
	}
},
false);

function getCurrentTime(){
	
	if(player){
		
		return player.currentTime;
		
	}
	
	return 'No Player';
	
}

function isReferrer () {
    try {
        return document.referrer.indexOf(location.protocol + "//" + location.host) === 0;
    } catch (e) {
        return true;
    }
}
setInterval(function() {
	var player = $('#player2');
	var realdomain = 'http://'+extractDomain(document.referrer);
	
	if(realdomain == 'http://localhost'){
		window.top.postMessage({"currenttime":this.player.get(0).currentTime,"duration":this.player.get(0).duration,"el_name":"<?php echo $el_name; ?>"},realdomain);
		return;
	}
	if(isReferrer ()){
		window.postMessage({"currenttime":this.player.get(0).currentTime,"duration":this.player.get(0).duration,"el_name":"<?php echo $el_name; ?>"},realdomain);
	}else{
		window.top.postMessage({"currenttime":this.player.get(0).currentTime,"duration":this.player.get(0).duration,"el_name":"<?php echo $el_name; ?>"},realdomain);
	}

	
},500);

function extractDomain(url) {
    var domain;
    //find & remove protocol (http, ftp, etc.) and get domain
    if (url.indexOf("://") > -1) {
        domain = url.split('/')[2];
    }
    else {
        domain = url.split('/')[0];
    }
    //find & remove port number
    domain = domain.split(':')[0];

    return domain;
}
</script>
<?php
	if($subtitles == 'http://' && $showsubtitles) {
?>
	<style>
	.player {
		//margin-top:80px;
	  	margin:auto; padding-bottom:0; padding-top:25px;
	}
	</style>
<?php
	}
?>
</body>
</html>
