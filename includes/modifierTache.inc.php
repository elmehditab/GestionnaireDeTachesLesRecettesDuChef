<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $id = $_POST["id"];
    $categorie = $_POST["categorie"];
    $description = $_POST["description"];
    $fileName = null;

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $fileName = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        
        $allowedExt = array("jpg", "jpeg", "png", "webp");
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExt)) {
            die("seuls les fichiers JPG, JPEG, PNG et WEBP sont autorisés.");
        }
        
        $fileDestination = "../images/" . $fileName;

        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
            die("Erreur");
        }
    }

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
    header("Location: ../index.php");
}
?>
