<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
	<head>
		<title>Webituns - Remote Web Contol for iTunes</title>
		<base href="<?= base_url() ?>" />
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<meta name="keywords" content="iTunes, web based remote control, network, applescript, php, apache">
		<meta name ="author" content="German Rodriguez">

		<link href="public/stylesheets/style.css" type="text/css" rel="stylesheet">
		<link type="text/css" href="public/stylesheets/eggplant/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
		
		<script type="text/javascript" src="public/scripts/jquery.min.js"></script>
		<script type="text/javascript" src="public/scripts/jquery.tools.min.js"></script>
		<script type="text/javascript" src="public/scripts/jquery.ui.js"></script>
		<script type="text/javascript" src="public/scripts/ajaxhelper.js"></script>
		<script type="text/javascript" src="public/scripts/application.js"></script>
	</head>


	<body>

		<div id="header" class="rounded">
			<img src="public/images/logo.jpg" alt="webituns">
			<span>webituns</span> Controls your iTunes wherever you are!
			<div class="menu">
				<a href="setup" alt="Setup">Setup</a>
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
						<img id="loading_img" style="display: none" src="public/images/loading.gif">
						<div id="player_status_text" class="clearfix"></div>
					</div>
				
				</div>
				
				<div id="queue_list">
					<a class="left" href="javascript:HTMLHelper.queue_scroll(1);"><img src="public/images/left.png" /></a>
					<div class="scroller">
						<div class="scroller_content">
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>
							<div class="song"><img src="public/images/song_egg.png"></div>							
						</div>
					</div>
					<a class="right" href="javascript:HTMLHelper.queue_scroll(-1);"><img src="public/images/right.png" /></a>
				</div>
			
			</div> <!-- subheader -->
			
			<div id="songs">
				
				<div class="info_commands">
					<div class="search">
						Search: <input class="rounded" type="text" name="query" />
						<img src="public/images/search.png" />
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