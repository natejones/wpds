jQuery(document).ready(function ($) {

/* REFRESH PAGE EVERY FIVE MINUTES ----
window.setTimeout('location.reload(true)', 300000);
/* /REFRESH PAGE EVERY FIVE MINUTES ---- */

/* CLOCK ---------------------------------
thanks to @Bluxart :: http://www.alessioatzeni.com/blog/css3-digital-clock-with-jquery/

Put this into a text widget to display the time & date:
<div class="clock">
<ul>
<li id="hours"> </li>
<li id="point">:</li>
<li id="min"> </li>
<li id="point">:</li>
<li id="sec"> </li>
</ul>
<div id="Date"></div>
</div>
---------------------------------*/

// Create two variable with the names of the months and days in an array
var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec" ];
var dayNames= ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

//setInterval( function() {
// Create a newDate() object and extract the seconds of the current time on the visitor's
//	var seconds = new Date().getSeconds();
// Add a leading zero to seconds value
//	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
//	},1000);

setInterval( function() {
// Create a newDate() object and extract the minutes of the current time on the visitor's
var minutes = new Date().getMinutes();
// Add a leading zero to the minutes value
$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
},1000);

setInterval( function() {
// Create a newDate() object and extract the hours of the current time on the visitor's
var hours = new Date().getHours();
if(hours>=13){
	hours -= 12};
	// Add a leading zero to the hours value
	$("#hours").html(hours);
	}, 1000);
});


if ($('.dock > .columns > .textwidget > div > h6:contains(" double")')) {
	$('.dock > .columns > .textwidget');
	document.body.innerHTML.replace(' double', '');




/* VIMEO API ---------------------------------*/


}
