/*
 *  JavaScript Ajax Helper
 *  @autor: German Rodriguez
 *
 */

var AjaxHelper = {
	loadingImage: $("#loading_img"),
	playerStatus: $("#player_status_text"),
	basePath: $("base").attr("href") + "index.php/",
	
	call: function(url, data, callback) {
		this.startLoading();
		
		$.ajax({
			url: this.basePath + url,
			data: data,
			async: false,
			dataType: "json",
			success: function(msg) {
				
				if (msg.error) {
					alert(msg.error);
					return;
				}
				
				callback(msg);	
			}		
		});
		
		this.endLoading();
	},
	
	endLoading: function() {
		this.loadingImage.show();
		//playerStatus.html("Working");
	},
	
	startLoading: function() {
		this.loadingImage.hide();
	}
};