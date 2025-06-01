<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: php/login.php");
    exit;
}
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Compte</title>
</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($user['prenom']) ?> <?= htmlspecialchars($user['nom']) ?></h1>
    <p>Type de compte : <?= $user['type'] ?></p>
    <a href="php/logout.php">Se déconnecter</a>
</body>
</html>
