window.onload = function(){
  $.ajax('../php/profile.php/getProfile', {
    method : 'GET'
  }).done(function(data){
      profile = data[0];
      // console.log(profile);
      document.getElementById('email').innerHTML = profile['email'];
      document.getElementById('nom').innerHTML = profile['nom'];
      document.getElementById('prenom').innerHTML = profile['prenom'];
      if (profile['profilepicture']) {
        $('#profilepicture').html(profile['profilepicture']);
      }
  });
}

function updateProfile(){
  var password = $("#password_input").val();
  var firstname = $("#prenom_input").val();
  var lastname = $("#nom_input").val();

  if (!password || !firstname || !lastname){
    alert("Veuillez remplir tous les champs");
    return;
  }

  // Detect if a script is trying to be injected
  if (password.includes("<script>") || firstname.includes("<script>") || lastname.includes("<script>")) {
    alert("Pas de XSS script chez nous ! :)");
    return;
  }

  $.ajax('../php/profile.php/updateProfile', {
    method : 'POST', 
    data : {
        password : password,
        firstname : firstname,
        lastname : lastname,
    },
  }).done(function(data){
      if (data){
          window.location.href = "personal_info.html";
      }
      else{
          alert("Erreur de modification, veuillez réessayer");
      }
  });
}

// Fonction pour afficher ou masquer le formulaire de modification
function toggleEditForm() {
  var form = document.getElementById('updateForm');
  var infoSection = document.getElementById('infoSection');
  var button = document.getElementById('editButton');
  
  if (form.style.display === "none") {
    form.style.display = "block";
    infoSection.style.display = "none";

    // Pré-remplir les champs du formulaire avec les valeurs actuelles
    document.getElementById('nom_input').value = document.getElementById('nom').innerText;
    document.getElementById('prenom_input').value = document.getElementById('prenom').innerText;

    button.innerText = "Annuler";
  } else {
    form.style.display = "none";
    infoSection.style.display = "block";
    button.innerText = "Modifier vos informations";
  }
}

// Fonction pour annuler la modification et revenir à l'affichage normal
function cancelEdit() {
  var form = document.getElementById('updateForm');
  var infoSection = document.getElementById('infoSection');
  var button = document.getElementById('editButton');
  
  form.style.display = "none";
  infoSection.style.display = "block";
  button.innerText = "Modifier vos informations";
}