




$(function(){
  $('#search').keydown(function(){
    setTimeout(function() {
      $('#prov-output').text($('#search').val());
      window.history.replaceState(null, '?q='+$('#search').val(), '?q='+$('#search').val());
    }, 50);
  });
});



