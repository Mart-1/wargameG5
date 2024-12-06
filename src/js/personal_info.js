window.onload = function(){
  $.ajax('../php/profile.php/getProfile', {
    method : 'GET'
  }).done(function(data){
      profile = data[0];
      console.log(profile);
      $('#email').text(profile['email']);
      $('#nom').text(profile['nom']);
      $('#prenom').text(profile['prenom']);
      if (profile['profilepicture']) {
        $('#profilepicture').html(profile['profilepicture']);
      }
  });
}

function updateProfile(){
  var password = $("#password_input").val();
  var firstname = $("#prenom_input").val();
  var lastname = $("#nom_input").val();
  // var profilepicture = $("#profile_picture_input")[0].files[0];

  $.ajax('../php/database.php/updateProfile', {
    method : 'POST', 
    data : {
        password : password,
        firstname : firstname,
        lastname : lastname,
        // profilepicture : profilepicture
    },

  });
}