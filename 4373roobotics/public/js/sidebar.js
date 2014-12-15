var toggled = true;
	function registerEventHanglers() {
		$(document).mousemove(function(event) {
			if (event.pageX < 155) {
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
	}
	$(document).ready(function() {
		// $("#wrapper").toggleClass("toggled"); // Uncomment this to make the have sidebar closed by default
		document.getElementById('sidebar-wrapper').onmouseover=registerEventHanglers; // Don't register event handler until mose enters sidebar
	});