(function($) {

	"use strict";

	$(document).ready(function() {

		$('.countdown').countdown('2019/07/01', function(event) {
		$(this).html(event.strftime('' +
			'<span class="countdown-section"><span class="countdown-amount">%D</span> <span class="countdown-period">jours</span></span> ' +
			'<span class="countdown-section"><span class="countdown-amount">%H</span> <span class="countdown-period">heures</span></span> ' +
			'<span class="countdown-section"><span class="countdown-amount">%M</span> <span class="countdown-period">minutes</span></span> ' +
			'<span class="countdown-section"><span class="countdown-amount">%S</span> <span class="countdown-period">secondes</span></span>'));
		});

	}); // End document ready

})(jQuery);