<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
	<head>
		<title>Webituns - Remote Web Contol for iTunes</title>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<meta name="keywords" content="iTunes, web based remote control, network, applescript, php, apache">
		<meta name ="author" content="German Rodriguez">

		<link href="css/style.css" type="text/css" rel="stylesheet">
		<link type="text/css" href="css/eggplant/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.js"></script>
		<script type="text/javascript" src="js/HTMLhelper.js"></script>
		
		<script language="JavaScript">
			$(document).ready(function() {
				HTMLHelper.init();
			});
		</script>
	</head>


	<body>

		<div id="header" class="rounded">
			<img src="img/logo.jpg" alt="webituns">
			<span>webituns</span> Controls your iTunes wherever you are!
			<div class="menu">
				<a href="setup.php" alt="Setup">Setup</a>
			</div>
		</div>
		
		<div id="content" class="rounded ui-tabs ui-widget ui-widget-content ui-corner-all">
			<div class="subheader clearfix">
			
				<div class="controls">	
					<ul id="icons" class="ui-widget ui-helper-clearfix">
						<li id="cmd_previous" class="ui-state-default ui-corner-all" title="Seek Previous"><span class="ui-icon ui-icon-seek-first"></span></li>
						<li id="cmd_play" class="ui-state-default ui-corner-all" title="Play"><span class="ui-icon ui-icon-play"></span></li>
						<li id="cmd_pause" class="ui-state-default ui-corner-all" title="Pause"><span class="ui-icon ui-icon-pause"></span></li>
						<li id="cmd_next" class="ui-state-default ui-corner-all" title="Seek Next"><span class="ui-icon ui-icon-seek-end"></span></li>
					
						<li><div style="width: 15px"></div></li>
					
						<li id="cmd_refresh" class="ui-state-default ui-corner-all" title="Refresh">
						<span class="ui-icon ui-icon-refresh"/>
						</li>
					</ul>
					<div id="volume"></div>
					<input type="text" id="volume_amount" />
					<div id="player_status">
						<img id="loading_img" style="display: none" src="img/loading.gif">
						<div id="player_status_text" class="clearfix"></div>
					</div>
				
				</div>
				
				<div id="queue_list">
					<a class="left" href="javascript:HTMLHelper.queue_scroll(1);"><img src="img/left.png" /></a>
					<div class="scroller">
						<div class="scroller_content">
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>
							<div class="song"><img src="img/song_egg.png"></div>							
						</div>
					</div>
					<a class="right" href="javascript:HTMLHelper.queue_scroll(-1);"><img src="img/right.png" /></a>
				</div>
			
			</div> <!-- subheader -->
			
			<div id="songs">
				
				<div class="info_commands">
					<div class="search">
						Search: <input class="rounded" type="text" name="query" />
						<img src="img/search.png" />
					</div>
					<br /><br />
					share on twitter<br />
					google search<br />
					wikipedia search<br />
					flickr search<br />
				</div>
				
				<div class="list">
					<ul>
						<li style="text-align: center"><a href="javascript:void()">loading playlist...</a></li>
					</ul>
				</div>
				
			</div> <!-- song_list -->
			
			
			
		</div>
		
		<div id="footer" class="rounded">
			Webituns Beta
		</div>

	</body>
</html>