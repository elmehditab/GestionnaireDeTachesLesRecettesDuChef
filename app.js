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
        let nouvelleDesk = document.querySelector('#popup1 #description').value
        let categorie = document.querySelector('.popupContainer #categorie-selection').value;
  
        tache.querySelector(".tache h2").textContent = categorie;
        const image = tache.querySelector(".tache-image");
        let newImage = document.getElementById('image');
        if (newImage.files[0]) image.src = URL.createObjectURL(newImage.files[0]);
        tache.querySelector(".tache-texte p").innerText = nouvelleDesk;
        fermerPopup();
      }
    }
  
    document.querySelector(".popupBtn button").addEventListener("click", modifierTache);
    document.querySelector(".fleche-retour").addEventListener("click", fermerPopup);
  });