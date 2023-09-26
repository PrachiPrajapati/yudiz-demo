jQuery(document).ready(function() {
	var $ = jQuery;
	if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
		$(document).on('click', '#str_upload_logo_btn', function(e) {
			e.preventDefault();
			var button = $(this);
			wp.media.editor.send.attachment = function(props, attachment) {
				imgurl = attachment.url;
				console.log(attachment.filename);
				$('#career_follow_us_logo').val(imgurl);
				$('.brand-logo-src').attr( "src" ,imgurl);
			};
			wp.media.editor.open(button);
			return false;
		});
		$(document).on('click', '#insta_upload_logo_btn', function(e) {
			e.preventDefault();
			var button = $(this);
			wp.media.editor.send.attachment = function(props, attachment) {
				imgurl = attachment.url;
				console.log(attachment.filename);
				$('#career_instagram_logo').val(imgurl);
				$('.insta-logo-src').attr( "src" ,imgurl);
			};
			wp.media.editor.open(button);
			return false;
		});
	}
});