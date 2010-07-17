/*
 *  JavaScript Ajax Helper
 *  @autor: German Rodriguez
 *
 */

var AjaxHelper = {
	loadingImage: $("#loading_img"),
	playerStatus: $("#player_status_text"),
	basePath = $("base").attr("href"),
	
	call: function(url, data, callback) {
		AjaxHelper.startLoading();
		
		$.ajax({
			url: url,
			data: data,
			async: false,
			dataType: "json",
			success: function(msg) {
				callback(msg);	
			}		
		});
		
		AjaxHelper.endLoading();
	},
	
	endLoading: function() {
		loadingImage.show();
		playerStatus.html("Working");
	},
	
	startLoading: function() {
		loadingImage.hide();
	}
};