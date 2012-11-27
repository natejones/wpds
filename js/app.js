jQuery(document).ready(function ($) {

	/* ORBIT ---------------------------------
	don't put slider on phones
	*/

	if ($('#container').width() <= 767){
	} else {
		$('.post-box').orbit({
			fluid: '16x9',
			advanceSpeed: 12000

		});
	}


	/* FOOTER WIDGETS ---------------------------------*/
	$('.widget_text').equalHeights()

	/* if you change the number of footer widgets, be sure to change this too ---------------------------------*/
	$('.row article.widget').last().removeClass('two').addClass('six');


	$.getJSON("http://api.twitter.com/1/statuses/user_timeline/natejones.json?count=1&include_rts=1&callback=?", function(data) {
     $("#twitter").html(data[0].text);
});

	/* WEATHER WIDGET ---------------------------------
	Set the weather location and other variables in weather.php.
	The javascript timer for the weather widget is in footer.php to allow it to find the correct path to weather.php.
	---------------------------------*/



	/* FOOTER ICONS ---------------------------------
	add FontAwesome icons to the footer if you're into that sort of thing
	
	$("h6:contains('Twitter')").prepend('&nbsp;').addClass('icon-twitter');
	$("h6:contains('@')").prepend('&nbsp;').addClass('icon-twitter');
	$("h6:contains('Facebook')").prepend('&nbsp;').addClass('icon-facebook');
	$("h6:contains('Event')").prepend('&nbsp;').addClass('icon-calendar');
	$("h6:contains('Announce')").prepend('&nbsp;').addClass('icon-bullhorn');
	---------------------------------*/
	

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
var dayNames= ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]

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
  
