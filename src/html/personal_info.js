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
  