<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="images/logo.png" type="image/x-icon"/>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>les recettes du chef.</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>les recettes du chef.</h1>
    </header>
    <div class="fleche-retour">
      <a href="index.php"><img src="images/fleche-gauche.png" /></a>
    </div>
    <div class="formulaire-ajout">
      <div class="Titre2"><h2>ajouter une recette</h2></div>
      <form action="includes/processDynamique.inc.php" method="post" enctype="multipart/form-data">
        <br />
        <div class="cl-cate">
          <label for="categorie">Catégorie:</label>
          <select required name="categorie" id="categorie-selection">
            <option value="categorie">Veuillez choisir une catégorie</option>
            <option value="Entrées">Entrées</option>
            <option value="Plats">Plats</option>
            <option value="Desserts">Desserts</option>
            <option value="Boissons">Boissons</option>
          </select>
        </div>
        <br />
        <div class="cl-desc">
          <label for="description">Description du plat : </label>
          <textarea
            required
            name="description"
            id="description"
            cols="20"
            rows="2"
          ></textarea>
        </div>
        <br />
        <div class="cl-image">
          <label for="image">Nouvelle image :</label>
          <input required type="file" id="image" accept="image/*" name="image" />
        </div>
        <br />
        <div class="Bouton-envoyer">
          <button>SOUMETTRE</button>
        </div>
      </form>
    </div>
    <footer></footer>
  </body>
</html>