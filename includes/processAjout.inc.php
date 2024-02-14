<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $categorie = $_POST["categorie"];
    
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
            
            $query = "INSERT INTO nouvelletache(categorie, description, image_url) VALUES (:categorie, :description, :image_url);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":categorie", $categorie);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":image_url", $fileName);
            $stmt->execute();
            
            header("Location: ../index.php");
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
