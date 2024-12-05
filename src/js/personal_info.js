window.onload = function(){
  $.ajax('../php/profile.php/getProfile', {
    method : 'GET'
  }).done(function(data){
  });
}