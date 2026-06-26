<?php

$host = 'localhost';
$dbname = 'careboard_recette_db';
$user = 'jouveau';
$password = 'AdminRoot@2026';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur de connexion Ã  la base de donnÃ©es: " . $e->getMessage();
}
?>