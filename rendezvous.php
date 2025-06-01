<?php
// prendre_rdv.php

$database = "omnes_immobilier";
$db_handle = mysqli_connect('localhost', 'root', '', $database);

if (!$db_handle) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$id_agent = isset($_GET['id_agent']) ? intval($_GET['id_agent']) : 0;
if ($id_agent === 0) die("ID agent invalide.");

$query = "SELECT * FROM agents WHERE id = ?";
$stmt = mysqli_prepare($db_handle, $query);
mysqli_stmt_bind_param($stmt, "i", $id_agent);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$agent = mysqli_fetch_assoc($result);

if (!$agent) die("Agent introuvable.");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Prendre un rendez-vous</title>
    <style>
        body {
            background-color: #f5faff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .rdv-form {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #0074D9;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #0074D9;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 25px;
            width: 100%;
            font-size: 15px;
        }

        button:hover {
            background-color: #005ea6;
        }
    </style>
</head>
<body>

    <form action="confirmer_rdv.php" method="post" class="rdv-form">
        <h2>Prendre un rendez-vous avec <?= htmlspecialchars($agent['prenom'] . ' ' . $agent['nom']) ?></h2>

        <input type="hidden" name="id_agent" value="<?= $agent['id'] ?>">

        <label for="date_rdv">Date du rendez-vous :</label>
        <input type="date" id="date_rdv" name="date_rdv" required>

        <label for="heure_debut">Heure de début :</label>
        <input type="time" id="heure_debut" name="heure_debut" required>

        <label for="heure_fin">Heure de fin :</label>
        <input type="time" id="heure_fin" name="heure_fin" required>

        <label for="message">Message (facultatif) :</label>
        <textarea id="message" name="message" rows="4" placeholder="Votre message pour l'agent..."></textarea>

        <button type="submit">Confirmer le rendez-vous</button>
    </form>

</body>
</html>
