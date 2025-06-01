<?php
session_start();
include 'config.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mdp = mysqli_real_escape_string($conn, $_POST["mdp"]); // en clair
    $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $adresse = mysqli_real_escape_string($conn, $_POST["adresse"]);

    $check = mysqli_query($conn, "SELECT * FROM clients WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Un compte avec cet email existe déjà.";
    } else {
        $sql = "INSERT INTO clients (nom, prenom, email, mdp, telephone, adresse) 
                VALUES ('$nom', '$prenom', '$email', '$mdp', '$telephone', '$adresse')";

        if (mysqli_query($conn, $sql)) {
            $success = "Compte créé avec succès. Vous pouvez maintenant vous connecter.";
        } else {
            $error = "Erreur lors de la création du compte : " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Créer un compte client</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <a href="login.php" class="btn btn-success">Se connecter</a>
    <?php else: ?>
        <form method="post">
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mot de passe :</label>
                <input type="password" name="mdp" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone" class="form-control">
            </div>
            <div class="form-group">
                <label>Adresse :</label>
                <input type="text" name="adresse" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Créer mon compte</button>
        </form>
    <?php endif; ?>
</body>
</html>
