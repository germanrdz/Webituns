/*
 *  JavaScript Application
 *  @autor: German Rodriguez
 *
 */

String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); }

var Application = function() {
	
	var queue_scroller = $("#queue_list .scroller_content");	
	var player_status_text = $("#player_status_text");
	
	var player_status;
	
	return {
		getStatus: function() {
			AjaxHelper.call("player/getStatus", {}, function(data) {

				if (data.status == "playing") {
					player_status_text.html(getCurrentSong());
				}
				else {
					player_status_text.html("Click play to start");
				}
				
			});
		},
		
		playFile: function(filePath) {
			alert(filePath);
		},
		
		fillSongList: function() {			
			AjaxHelper.call("player/getSongList", {}, function(data) {	
				var playList = $("#songs .list ul");
							
				playList.html("");
				$.each(data.songs, function(i, item) {
					var listItem = $.LI({ }, link = $.A({}, item["Artist"] + " - " + item["Name"]));
					
					$(link).click(function() {
						Application.playFile(item["Location"]);	
					});
					
					$(listItem).hover(function() {
						$(this).css("cursor", "pointer");
					});
					
					playList.append(listItem);
				});
				
			});
		},
					
		msgError: function(msg, div) {
			var template = '<div style="padding: 0pt 0.7em; margin-top: 20px;" class="ui-state-highlight ui-corner-all">';
				template =+ '<p><span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-info"/>{msg}</p>';
				template =+ '</div>';	
			
				div.append(template.replace("{msg}", msg));
		},
	
		msgStatus: function (msg) {
			$("#player_status_text").html(msg);
		},
	
		queue_scroll: function(amount) {
			amount = amount * 20;
			var scroller = $("#queue_list .scroller");
			scroller.scrollLeft(amount + scroller.scrollLeft());
		},
	
		getStatus: function() {
			AjaxHelper.call("player/getStatus", {}, function(data) {

				if (data.status == "playing") {
					player_status_text.html(getCurrentSong());
				}
				else {
					player_status_text.html("Click play to start");
				}
				
			});
		},
	
		getCurrentSong: function() {
			loading();
			var html = $.ajax({
				url: "controller.php",
				data: "q=current_song",
				async: false,
				dataType: "text",
				success: function(msg) {
					end_loading();
				}			
			}).responseText;
			return html;		
		},

		// deprecated, use AjaxHelper instead.
		loading: function() {
			alert("loading: deprecated");
			$("#loading_img").show();
			$("#player_status_text").html("Working");
		},
		
		// deprecated, use playFile(filePath) instead
		play: function(trackID) {
			HTMLHelper.loading();
			var html = $.ajax({
				url: "controller.php",
				data: "q=playtrack&track=" + trackID,
				async: false,
				dataType: "text",
				success: function(msg) {
					HTMLHelper.end_loading();
					alert(msg);
					$("#player_status_text").html(HTMLHelper.getCurrentSong());
				}
			});
		},
	
		// deprecated, use AjaxHelper instead
		end_loading: function() {
			alert("end_loading: deprecated")
			$("#loading_img").hide();
			//$("#player_status_text").html("Click play to start");
		},
	
		init: function() { 		
				
			queue_scroller.scrollLeft(0);	
			$(queue_scroller).css("width", $("#queue_list .song").size() * 70 + "px");
		
			// todo set up on server 
			$("#volume").slider({
				range: "min",
				min: 0,
				max: 100,
				value: 80,
				slide: function(event, ui) {
					$("#volume_amount").val(ui.value);
				}
			});
			
			$("#volume_amount").val($("#volume").slider("value"));
		
			// todo: add ajax click code to control buttons
		
			$("#cmd_play").click(function() {
				HTMLHelper.loading();
				var html = $.ajax({
					url: "controller.php",
					data: "q=play",
					async: false,
					dataType: "text",
					success: function() {
						$("#player_status_text").html(HTMLHelper.getCurrentSong());
						HTMLHelper.end_loading();
					}
				});
			});
		
			$("#cmd_pause").click(function() {
				HTMLHelper.loading();
				var html = $.ajax({
					url: "controller.php",
					data: "q=pause",
					async: false,
					dataType: "text",
					success: function(msg) {
						HTMLHelper.msgStatus(msg);
						HTMLHelper.end_loading();
					}
				});
			});
		
			$("#cmd_next").click(function(){
				HTMLHelper.loading();
				var html = $.ajax({
					url: "controller.php",
					data: "q=next",
					async: false,
					dataType: "text",
					success: function(msg) {
						$("#player_status_text").html(HTMLHelper.getCurrentSong());
						HTMLHelper.end_loading();
					}
				});			
			});
		
			$("#cmd_previous").click(function(){
				HTMLHelper.loading();
				var html = $.ajax({
					url: "controller.php",
					data: "q=prev",
					async: false,
					dataType: "text",
					success: function(msg) {
						$("#player_status_text").html(HTMLHelper.getCurrentSong());
						HTMLHelper.end_loading();
					}
				});			
			});
				
			player_status = Application.getStatus();

			this.fillSongList();
		}
	
	};
		
}();

	$(document).ready(function() {
		Application.init();
	});