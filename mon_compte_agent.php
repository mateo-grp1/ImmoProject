<?php
session_start();
$bdd = new mysqli('localhost', 'root', '', 'omnes_immobilier');

// Sécurité
if (!isset($_SESSION["id"]) || $_SESSION["user_type"] !== "agents") {
    header("Location: login.php");
    exit();
}

$id_agent = $_SESSION["id"];

// 🔎 Requête infos agent
$stmt = $bdd->prepare("SELECT nom, prenom, email FROM agents WHERE id = ?");
$stmt->bind_param("i", $id_agent);
$stmt->execute();
$result = $stmt->get_result();
$agent = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Compte Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="mb-4">Bienvenue <?= htmlspecialchars($agent['prenom']) ?> <?= htmlspecialchars($agent['nom']) ?> (Agent)</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">📋 Mes informations</h5>
            <p><strong>Nom :</strong> <?= htmlspecialchars($agent['nom']) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($agent['prenom']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($agent['email']) ?></p>
        </div>
    </div>

    <a href="agenda_agent.php" class="btn btn-primary">📅 Voir mon agenda</a>
    <a href="logout.php" class="btn btn-danger float-end">Déconnexion</a>

</body>
</html>
