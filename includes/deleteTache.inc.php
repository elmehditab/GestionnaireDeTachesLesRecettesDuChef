<?php
include 'dbconnexion.inc.php';


$stmt = $pdo->prepare("DELETE FROM nouvelletache WHERE id = :id");
$stmt->execute(['id' => $id]);

$stmt = $pdo->query("SELECT * FROM nouvelletache");

echo '<aside class="tache--container">';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="tache" data-id="' . $row["id"] . '">
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
