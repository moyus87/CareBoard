<?php

require_once("./PDO.php");

session_start();

$sql = "SELECT * FROM Patients ORDER BY dpVR ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();

$client = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue dr.<?= htmlspecialchars($_SESSION['nom']) . "  " .  htmlspecialchars($_SESSION['prenom']) ?> .</h1>
    <a href="./ajoutPatient.html" class="text-right">+ ajouter un patient</a>
    <br><br><br><br><br>
    <table class="border-collapse border border-gray-400 w-full table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 p-5">Nom</th>
                <th class="border border-gray-300">Préom</th>
                <th class="border border-gray-300">N°patient</th>
                <th class="border border-gray-300">IDE attribué</th>
                <th class="border border-gray-300">Modèle pompe</th>
                <th class="border border-gray-300">Date dernière VR</th>
                <th class="border border-gray-300">Date prochaine VR</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($client as $patient): ?>
        <tr>
            <td class="border border-gray-300 text-center p-3 text-xl"><?= htmlspecialchars($patient['nom']) ?></td>
            <td class="border border-gray-300 text-center text-xl"><?= htmlspecialchars($patient['prenom']) ?></td>
            <td class="border border-gray-300 text-center text-xl"><?= htmlspecialchars($patient['NumPatient']) ?></td>
            <td class="border border-gray-300 text-center text-xl"><?= htmlspecialchars($patient['ideAttr']) ?></td>
            <td class="border border-gray-300 text-center text-xl"><?= htmlspecialchars($patient['Mpompe']) ?></td>
            <td class="border border-gray-300 text-center text-xl"><?= htmlspecialchars($patient['ddVR']) ?></td>
           <td class="border border-gray-300 text-center text-xl"><?= htmlspecialchars($patient['dpVR']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>    
</body>
</html>