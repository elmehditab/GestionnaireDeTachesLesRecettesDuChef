<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $id = $_POST["id"];
    $categorie = $_POST["categorie"];
    $description = $_POST["description"];
    $fileName = null;

    $fileName = $_FILES["image"]["name"];
    $fileTmpName = $_FILES["image"]["tmp_name"];
    
    $allowedExt = array("jpg", "jpeg", "png","webp");
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    if (!in_array($fileExt, $allowedExt)) {
        die("Erreur : seuls les fichiers JPG, JPEG, PNG et WEBP sont autorisés.");
    }
    
    $fileDestination = "../images/" . $fileName;


    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        try {
            require_once "dbconnexion.inc.php";
        
        if ($fileName !== null) {
            $query = "UPDATE nouvelletache SET categorie = :categorie, description = :description, image_url = :image_url WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":image_url", $fileName);
        } else {
            $query = "UPDATE nouvelletache SET categorie = :categorie, description = :description WHERE id = :id";
            $stmt = $pdo->prepare($query);
        }
        
        $stmt->bindParam(":categorie", $categorie);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        die();
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    } else {
        die("Erreur lors du téléchargement du fichier.");
    }
} else {
    header("Location: ../index.php");
}
?>
