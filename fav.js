function setfav() {
var today = new Date();
var dd = today.getDate();

var link = "https://calendar.google.com/googlecalendar/images/favicon_v2010_" + dd + ".ico";
var fav = '<link rel="shortcut icon" href="' + link +'" type="image/x-icon"/>';
document.write(fav);
}
setfav();
