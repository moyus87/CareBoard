<?php

session_start();

require_once("./PDO.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nump = $_POST['nump'];
    $ide = $_POST['ide'];
    $pompe = $_POST['pompe'];
    $ddVR = $_POST['ddvr'];
    $dpVR = $_POST['dpvr'];

    $reqMail = $conn->prepare("SELECT * FROM Patients WHERE NumPatient = ?");
    $reqMail->execute(array($nump));
    $mailExist = $reqMail->rowCount();
    if($mailExist == 0)
        {
            $insertMbr = $conn->prepare("INSERT INTO Patients(nom, prenom, NumPatient, ideAttr, Mpompe, ddVR, dpVR) VALUES(?,?,?,?,?,?,?)");
            $insertMbr->execute(array($nom, $prenom, $nump, $ide, $pompe, $ddVR, $dpVR));
            header('Location:./user.php');
            exit;
        }
        else {
            echo "Le patient est déjà enregistré.";
            exit;
        }
}
?>