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
  
    function modifierTache() {
      let description = $('#popup1 #description').val();
      let categorie = $('.popupContainer #categorie-selection').val();
      let idTache = tache.data('id');
      let formData = new FormData();
      formData.append('description',description);
      formData.append('categorie',categorie);
      formData.append('id',idTache);
      formData.append('image',$('image')[0].files[0]);

      $.ajax({
        url: 'includes/processModification.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(reponse){
          $("#tache-" + idTache).replaceWith(reponse);
          fermerPopup();
        },error:function(){
          alert('erreur lors de la modification');
        }
      });
    }
    document.querySelector(".popupBtn button").addEventListener("click", function(event) {
      event.preventDefault();
      modifierTache();
  });
  document.querySelector(".fleche-retour").addEventListener("click", fermerPopup);
  });