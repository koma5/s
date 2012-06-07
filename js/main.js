
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
        $('#results').load('http://5th.li/s/queries.php?q='+searchTerm);
  		}
  		else
  		{
  			window.history.replaceState(null, '.', '.');
  		}
    }, 50);
  });
});



