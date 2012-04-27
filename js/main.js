
$(function() {
  $("#search").focus();
});



$(function(){
  $('#search').keydown(function(){
    setTimeout(function() {
    	var searchTerm = $('#search').val();
    	if (searchTerm != '')
    	{
			window.history.replaceState(null, '?q='+searchTerm, '?q='+searchTerm);
		}
		else
		{
			window.history.replaceState(null, '.', '.');
		}
    }, 50);
  });
});



