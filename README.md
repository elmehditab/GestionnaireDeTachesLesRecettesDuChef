## GestionnaireDeTachesLesRecettesDuChef

## Fonctionnalités Implémentées

### Page HTML Principale (index.html)

La page principale contient une liste de tâches ainsi que des catégories sous forme de liens. Chaque catégorie, lorsqu'elle est cliquée, filtre les tâches affichées en fonction de celle sélectionnée. Cette page propose également un accès direct à la page d'ajout de tâches.

### Page d’Ajout de Tâche (ajout.html)

La page d'ajout de tâche offre un formulaire permettant aux utilisateurs de créer de nouvelles tâches. Les champs disponibles comprennent le nom de la tâche, sa catégorie et l'utilisateur affecté.

### Modification des Tâches

La modification des tâches est rendue possible grâce à JavaScript. Chaque tâche présente un bouton qui, lorsqu'il est cliqué, ouvre une interface d'édition où les utilisateurs peuvent modifier les différents attributs de la tâche. Une fois les modifications validées, les éléments HTML de la page principale sont mis à jour pour refléter les changements.

### Création d’une Tâche

Lors de la création d'une nouvelle tâche, les données du formulaire sont envoyées au serveur via une requête POST. PHP est alors utilisé pour récupérer ces données et les ajouter à la base de données correspondante.

### Affichage Dynamique des Tâches

Les tâches sont désormais affichées dynamiquement à partir des données stockées dans la base de données. Ainsi, il n'est plus nécessaire de coder manuellement chaque tâche dans le code HTML.

### Mise à Jour d’une Tâche avec AJAX

La mise à jour d'une tâche se fait de manière asynchrone grâce à une requête AJAX réalisée avec jQuery. Lorsque les utilisateurs modifient une tâche et valident les changements, les données sont envoyées au serveur qui les met à jour dans la base de données. Le fragment HTML de la tâche modifiée est ensuite renvoyé au client et inséré dans le DOM sans nécessiter de rechargement de page.

### Filtrage des Tâches par Catégorie

Les utilisateurs peuvent filtrer les tâches affichées en cliquant sur une des catégories disponibles. Cela permet de limiter l'affichage aux seules tâches relevant de la catégorie sélectionnée.

### Création d'une API REST

Une API REST a été mise en place avec trois routes pour gérer les tâches :
- `/taches/all` : Permet d'afficher toutes les tâches disponibles.
- `/tache/identifiant` : Permet d'afficher une seule tâche identifiée par son nom ou son id.
- `/deltache/identifiant` : Permet de supprimer une tâche identifiée par son nom ou son id. Une fois la tâche supprimée, la liste des tâches est à nouveau affichée.

## Utilisation

Pour utiliser ce système de gestion de tâches, suivez ces étapes :
1. Clonez ce repository sur votre machine.
2. Configurez un serveur local avec PHP et MySQL.
3. Importez la base de données fournie.
4. Lancez l'application et explorez les fonctionnalités disponibles.

