<?php
include 'dbconnexion.inc.php';
$category = $_GET['cat'] ?? 'all'; 

$query = "SELECT * FROM nouvelletache";
if ($category !== 'all') {
    $query .= " WHERE categorie = :category";
}

$stmt = $pdo->prepare($query);

if ($category !== 'all') {
    $stmt->bindParam(':category', $category);
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    echo '<div class="tache" id="tache-' . $row["id"] . '" data-id="' . $row["id"] . '">
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
?>