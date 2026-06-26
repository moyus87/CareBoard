<?php
// connexion PDO déjà disponible dans $conn
// require 'config.php'; // si besoin chez toi
require_once("./PDO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btnAj"])) {

    // Récupération et sécurisation des données
    $nom = $_POST["nom"] ?? null;
    $prenom = $_POST["prenom"] ?? null;
    $numPatient = $_POST["nump"] ?? null;
    $ideAttr = $_POST["ide"] ?? null;
    $mpompe = $_POST["pompe"] ?? null;
    $ddVR = $_POST["ddvr"] ?? null;
    $dpVR = $_POST["dpvr"] ?? null;

    if ($nom && $prenom && $numPatient && $ideAttr && $mpompe) {

        try {
            $sql = "INSERT INTO Patients 
                    (nom, prenom, NumPatient, ideAttr, Mpompe, ddVR, dpVR)
                    VALUES 
                    (:nom, :prenom, :numPatient, :ideAttr, :mpompe, :ddVR, :dpVR)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":numPatient" => $numPatient,
                ":ideAttr" => $ideAttr,
                ":mpompe" => $mpompe,
                ":ddVR" => $ddVR,
                ":dpVR" => $dpVR
            ]);

            // redirection après succès
            header("Location:/user.php");
            exit;

        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout : " . $e->getMessage();
        }

    } else {
        echo "Champs obligatoires manquants.";
    }

} else {
    header("Location: ajoutPatient.php");
    exit;
}
?>