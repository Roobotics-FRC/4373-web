var toggled = false;
	$("#wrapper").toggleClass("toggled");
	$(document).ready(function() {
		$(document).mousemove(function(event) {
			if (event.pageX < 175) {
				if (!toggled) {
					$("#wrapper").toggleClass("toggled");
					toggled = true;
				}
			}
			else {
				if (toggled) {
					$("#wrapper").toggleClass("toggled");
					toggled = false;
				}
			}
		});
	});