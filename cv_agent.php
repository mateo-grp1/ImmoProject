<?php
session_start();
include 'config.php';

if (!isset($_GET['id_agent'])) {
    die("Erreur : aucun agent sélectionné.");
}

$id_agent = intval($_GET['id_agent']);

$sql = "SELECT cv FROM agents WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_agent);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 0) {
    die("Agent introuvable.");
}

$agent = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CV de l'agent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2 class="mb-4">📄 CV de l’agent</h2>

    <?php if (!empty($agent['cv'])): ?>
        <img src="<?= htmlspecialchars($agent['cv']) ?>" alt="CV de l’agent" style="max-width: 100%; border: 1px solid #ccc; border-radius: 10px;">
    <?php else: ?>
        <div class="alert alert-warning">Aucun CV disponible pour cet agent.</div>
    <?php endif; ?>
</body>
</html>
