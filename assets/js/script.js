/**
 * Add event handler for corfimation of external links
 */
if ( linkConfirmationEnabled ) {
	document.querySelectorAll('a').forEach(function(elem) {
		elem.addEventListener('click', function(e) {
			var url = new URL( elem.href, window.location.origin );
			if ( url.protocol.includes('http') && url.origin !== window.location.origin ) {
				var confirmed = confirm('Du verlässt nun diese Seite und besuchst \n' + url.href + '\n\nBist du sicher?');
				if (!confirmed) {
					e.preventDefault();
				}
			}
		})
	});
}
