<?php

session_start();

require_once("./PDO.php");
if(isset($_POST['btnCo']))
{
    $email = htmlspecialchars($_POST['email']);
    $mdp = $_POST['mdp'];
    $reqUser = $conn->prepare("SELECT * FROM Infirmiers WHERE email = ? AND mdp = ?");
    $reqUser ->execute(array($email, $mdp));
    $userExist = $reqUser->rowcount();

    if($userExist == 1)
        {
            $userInfo = $reqUser->fetch();
            $_SESSION['nom'] = $userInfo['nom'];
            $_SESSION['prenom'] = $userInfo['prenom'];
            header("Location:./user.php");
            exit;
        } else {
            echo "L'identifiant ou le mot de passe est incorrect";
            exit;
        }
}
?>