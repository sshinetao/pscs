var xmlhttp = false;
if (window.XMLHttpRequest) { //Mozilla、Safari等浏览器
	xmlhttp = new XMLHttpRequest();
} else if (window.ActiveXObject) { //IE浏览器
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {
		}
	}
}
