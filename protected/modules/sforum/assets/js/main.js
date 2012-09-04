var fadeAway = function(id, time) {
	if( typeof time == 'undefined' )
		time = 3000;
	
	setTimeout("$('#" + id +"').fadeOut('slow')", time);
}