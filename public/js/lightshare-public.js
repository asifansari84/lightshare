(function( $ ) {
	'use strict';

	$(document).ready(function() {
		// Handle Copy Link button
		$('.lightshare-copy').on('click', function(e) {
			e.preventDefault();
			
			var url = $(this).data('url');
			var $btn = $(this);
			var originalText = $btn.find('.lightshare-text').text();
			
			if (!url) {
				return;
			}
			
			navigator.clipboard.writeText(url).then(function() {
				// Success feedback
				$btn.find('.lightshare-text').text('Copied!');
				setTimeout(function() {
					$btn.find('.lightshare-text').text(originalText);
				}, 2000);
			}).catch(function(err) {
				console.error('Could not copy text: ', err);
			});
		});
	});

})( jQuery );
