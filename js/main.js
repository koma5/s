
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
        $('#results').load('http://127.0.0.1:81/s/queries.php?q='+searchTerm);
  		}
  		else
  		{
  			window.history.replaceState(null, '.', '.');
  		}
    }, 50);
  });
});



