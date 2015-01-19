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
	if (navigator.userAgent.toLowerCase().indexOf('iphone')>-1 || navigator.userAgent.toLowerCase().indexOf('ipod')>-1 || navigator.userAgent.toLowerCase().indexOf('ipad')>-1 || navigator.userAgent.toLowerCase().indexOf('droid')>-1) {
		//$("#wrapper").toggleClass("toggled");
	}
	registerEventHanglers();
});
