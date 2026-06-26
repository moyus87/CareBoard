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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareBoard | Tableau de bord</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
        @theme {
            --color-primary: #76CDCD;
            --color-secondary: #26474E;
            --color-accent: #2CCED2;
        }
    </style>

</head>

<body class="min-h-screen bg-gradient-to-br from-secondary to-primary p-8">

    <div class="max-w-7xl mx-auto bg-white rounded-3xl shadow-2xl p-8">

        <!-- Header -->

        <div class="flex flex-col md:flex-row justify-between items-center mb-10">

            <div>
                <h1 class="text-4xl font-bold text-secondary">
                    Bonjour Dr.
                    <?= htmlspecialchars($_SESSION['nom']) ?>
                    <?= htmlspecialchars($_SESSION['prenom']) ?>
                </h1>

                <p class="text-gray-500 mt-2">
                    Tableau de bord CareBoard
                </p>
            </div>

            <a href="./ajoutPatient.html"
                class="mt-6 md:mt-0 bg-accent hover:bg-secondary text-white px-6 py-3 rounded-xl font-semibold transition shadow-lg">

                + Ajouter un patient

            </a>

        </div>

        <!-- Tableau -->

        <div class="overflow-x-auto rounded-2xl shadow">

            <table class="w-full overflow-hidden">

                <thead>

                    <tr class="bg-secondary text-white">

                        <th class="p-4 text-left">Nom</th>
                        <th class="p-4 text-left">Prénom</th>
                        <th class="p-4 text-center">N° Patient</th>
                        <th class="p-4 text-center">IDE attribué</th>
                        <th class="p-4 text-center">Pompe</th>
                        <th class="p-4 text-center">Dernière VR</th>
                        <th class="p-4 text-center">Prochaine VR</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($client as $patient): ?>

                    <tr class="border-b border-gray-200 hover:bg-primary/20 transition">

                        <td class="p-4 font-semibold text-secondary">
                            <?= htmlspecialchars($patient['nom']) ?>
                        </td>

                        <td class="p-4">
                            <?= htmlspecialchars($patient['prenom']) ?>
                        </td>

                        <td class="p-4 text-center">
                            <?= htmlspecialchars($patient['NumPatient']) ?>
                        </td>

                        <td class="p-4 text-center">
                            <?= htmlspecialchars($patient['ideAttr']) ?>
                        </td>

                        <td class="p-4 text-center">
                            <?= htmlspecialchars($patient['Mpompe']) ?>
                        </td>

                        <td class="p-4 text-center">
                            <?= htmlspecialchars($patient['ddVR']) ?>
                        </td>

                        <td class="p-4 text-center font-semibold text-secondary">
                            <?= htmlspecialchars($patient['dpVR']) ?>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>