




$(function(){
  $('#search').keydown(function(){
    setTimeout(function() {
    	var searchTerm = $('#search').val();
    	if (searchTerm != '')
    	{
			$('#prov-output').text(searchTerm);
			window.history.replaceState(null, '?q='+searchTerm, '?q='+searchTerm);
		}
		else
		{
			$('#prov-output').text("nothing");
			window.history.replaceState(null, '.', '.');
		}
    }, 50);
  });
});



