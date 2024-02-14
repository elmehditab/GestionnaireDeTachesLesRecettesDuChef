<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>les recettes du chef.</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="images/logo.png" type="image/x-icon"/>
</head>

<body>
  <header>
    <h1>les recettes du chef.</h1>
  </header>
  <div class="grid-layout">
    <main class="categorie--container">
      <div class="categorie categorie-1">
        <a href="index.php?cat=entree">entrées</a>
      </div>
      <div class="categorie categorie-2">
        <a href="index.php?cat=plat">plats</a>
      </div>
      <div class="categorie categorie-3">
        <a href="index.php?cat=dessert">desserts</a>
      </div>
      <div class="categorie categorie-4">
        <a href="index.php?cat=boisson">boissons</a>
      </div>
    </main>
    <?php
    $sqli = new mysqli('localhost', 'root', '', 'nouvelletache');

    if ($sqli->connect_error) {
      die('Erreur : ' . $sqli->connect_error);
    }
    $result = $sqli->query("SELECT * FROM nouvelletache");
    echo '<aside class="tache--container">';
    while ($row = $result->fetch_assoc()) {
      echo '<div  class="tache" id="tache">
      <div>
      <img class="tache-image" src="images/' . $row["image_url"] . '" alt="Description" />
      </div>
      <div class="tache-texte">
          <h2>' . $row['categorie'] . '</h2>
          <p>' . $row['description'] . '</p>
          <p class="modifier">
              <img class="open-modal" src="images/bouton-modifie.png" alt="" />
          </p>
      </div>
  </div>';
    }
    echo '</aside>';
    ?>
   </div>
    <div class="popupContainer" id="popup1">
      <div class="popupTitre">
        <h2>Modifier la recette</h2>
      </div>
      <div class="popupFermer">
        <a href=""></a>
      </div>
      <form>
        <br />
        <div class="popupCate">
          <label for="categorie">Catégorie:</label>
          <select name="categorie" id="categorie-selection">
            <option value="categorie">Veuillez choisir une catégorie</option>
            <option value="Entrées">Entrées</option>
            <option value="Plats">Plats</option>
            <option value="Desserts">Desserts</option>
            <option value="Boissons">Boissons</option>
          </select>
        </div>
        <br />
        <div class="popupDesc">
          <label for="description">Description du plat : </label>
          <textarea name="description" id="description" cols="20" rows="2"></textarea>
        </div>
        <br />
        <div class="popupImage">
          <label for="image">Nouvelle image :</label>
          <input type="file" id="image" accept="image/*" />
        </div>
        <br />
        <div class="popupBtn">
          <button>MODIFIER</button>
        </div>
        <div class="fleche-retour">
          <a href="index.php"><img src="images/fleche-gauche.png" /></a>
        </div>
      </form>
    </div>
    <div class="overlay"></div>
    
    
    <footer>
      <a href="ajout.php">ajouter une recette</a>
    </footer>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script type="module" src="app.js"></script>
</body>
</html>