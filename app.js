window.addEventListener("load", function () {
    const popupContainer = document.querySelector(".popupContainer");
    const overlay = document.querySelector(".overlay");
    let tache;
  
    function ouvrirPopup(event) {
      popupContainer.style.display = "block";
      overlay.style.display = "block";
  
      tache = event.target.closest(".tache");
  
      const description = tache.querySelector(".tache-texte p").innerText;
      const descInput = popupContainer.querySelector(".popupDesc textarea");
  
      descInput.value = description;
    }
  
    function fermerPopup() {
      popupContainer.style.display = "none";
      overlay.style.display = "none";
    }
  
    const openModal = document.querySelectorAll(".open-modal");
  
    openModal.forEach(function (button) {
      button.addEventListener("click", ouvrirPopup);
    });
  
function modifierTache(event) {
  event.preventDefault();

  if (tache) {
    
      let nouvelleDesc = document.querySelector('#popup1 #description').value;
      let categorie = document.querySelector('.popupContainer #categorie-selection').value;
      let newImage = document.getElementById('image').files[0];
      let tacheId = tache.getAttribute("data-id"); 

  
      let formData = new FormData();
      formData.append('description', nouvelleDesc);
      formData.append('categorie', categorie);
      if (newImage) formData.append('image', newImage);
      formData.append('id', tacheId);

      $.ajax({
          type: "POST",
          url: "includes/modifierTache.inc.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
              document.querySelector('.tache--container').innerHTML = response;
          },
          error: function() {
              alert('Erreur lors de la modification de la tâche');
          }
      });
  }
}
    document.querySelector(".popupBtn button").addEventListener("click", modifierTache);
    document.querySelector(".fleche-retour").addEventListener("click", fermerPopup);
  
  document.querySelectorAll('.categorie a').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const cat = this.getAttribute('href').split('=')[1];
      filtreTache(cat);
    });
  });
  
  function filtreTache(categorie) {
    $.ajax({
      url: 'includes/filtreTache.inc.php',
      type: 'GET',
      data: {cat: categorie},
      success: function(response) {
        document.querySelector('.tache--container').innerHTML = response;
      },
      error: function() {
        alert('Erreur lors du filtrage des tâches');
      }
    });
  }
  });

 