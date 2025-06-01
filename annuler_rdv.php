<?php
session_start();
include 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Identifiant du rendez-vous manquant ou invalide.";
    exit();
}

$id = intval($_GET['id']);  // sécurise la valeur

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

// Supprime le rendez-vous
$sql = "DELETE FROM rendezvous WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    // Redirige selon le type d'utilisateur
    if ($_SESSION["user_type"] === "clients") {
        header("Location: account_client.php");
    } elseif ($_SESSION["user_type"] === "agents") {
        header("Location: account_agent.php");
    } else {
        echo "Type d'utilisateur inconnu.";
    }
} else {
    echo "Erreur lors de la suppression du rendez-vous.";
}
?>
