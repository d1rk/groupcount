$().ready(function() {
	$('#left li').click(function() {
		var rel = $(this).attr('rel');
		$('#left li').removeClass('active');
		$(this).addClass('active');
		window.location.href = '#/' + rel;
	})
})