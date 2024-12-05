window.onload = function(){
  $.ajax('../php/profile.php/getProfile', {
    method : 'GET'
  }).done(function(data){
      profile = data[0];
      console.log(profile);
      $('#email').text(profile['email']);
      $('#nom').text(profile['nom']);
      $('#prenom').text(profile['prenom']);
  });
}