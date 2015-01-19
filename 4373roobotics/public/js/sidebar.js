var toggled = true;
function toggleSideBar() {
	$("#wrapper").toggleClass("toggled");
	toggled = toggled ? false : true;
}
function registerEventHanglers() {
	document.onmousemove=function(e) {
		if (e.pageX<=40) {
			if (!toggled) {
				toggleSideBar();
			}
		}
	};
	$("#sidebar-wrapper").mouseleave(toggleSideBar);
}
$(document).ready(function() {
	//$("#wrapper").toggleClass("toggled");
	registerEventHanglers();
});
