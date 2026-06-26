<?php

session_start();

require_once("./PDO.php");

if(isset($_POST['btnIns']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $reqMail = $conn->prepare("SELECT * FROM Infirmiers WHERE email = ?");
    $reqMail->execute(array($email));
    $mailExist = $reqMail->rowCount();
    if($mailExist == 0)
        {
            $insertMbr = $conn->prepare("INSERT INTO Infirmiers(nom, prenom, email, mdp) VALUES(?,?,?,?)");
            $insertMbr->execute(array($nom, $prenom, $email, $mdp));
            header('Location:./index.html');
            exit;
        }
        else {
            echo "L'utilisateur existe déjà.";
            exit;
        }
}
?>