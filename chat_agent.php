<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id']) || $_SESSION['user_type'] !== 'agents') {
    header("Location: login.php");
    exit();
}

$id_agent = $_SESSION['id'];
$id_client = isset($_GET['id_client']) ? intval($_GET['id_client']) : 0;

if (!$id_client) die("Aucun client sélectionné.");

// Récupérer les messages
$stmt = $conn->prepare("
    SELECT m.*, c.nom AS client_nom, c.prenom AS client_prenom
    FROM messages m
    JOIN clients c ON m.id_client = c.id
    WHERE m.id_agent = ? AND m.id_client = ?
    ORDER BY m.date_envoi ASC
");
$stmt->bind_param("ii", $id_agent, $id_client);
$stmt->execute();
$messages = $stmt->get_result();

// Marquer les messages reçus du client comme lus
$conn->query("UPDATE messages SET lu = 1 WHERE id_agent = $id_agent AND id_client = $id_client AND type = 'texte'");

include 'header_compte.php';
?>

<div class="container mt-5 mb-5">
    <h3 class="mb-4">💬 Discussion avec le client</h3>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Conversation avec le client #<?= $id_client ?>
        </div>
        <div class="card-body" style="height: 400px; overflow-y: auto;" id="chatbox">
            <?php while ($msg = $messages->fetch_assoc()): ?>
                <?php if ($msg['type'] === 'texte' || $msg['type'] === 'reponse' || $msg['type'] === 'email'): ?>
                    <div class="mb-3 d-flex <?= $msg['type'] === 'reponse' ? 'justify-content-end' : 'justify-content-start' ?>">
                        <div class="p-2 rounded <?= $msg['type'] === 'reponse' ? 'bg-primary text-white' : 'bg-light border' ?>" style="max-width: 70%;">
                            <?php if ($msg['type'] === 'email'): ?><strong>[E-mail]</strong><br><?php endif; ?>
                            <?= nl2br(htmlspecialchars($msg['contenu'])) ?><br>
                            <small class="text-muted"><?= date("d/m/Y H:i", strtotime($msg['date_envoi'])) ?></small>
                        </div>
                    </div>
                <?php elseif ($msg['type'] === 'audio'): ?>
                    <div class="mb-3 d-flex justify-content-start">
                        <div class="p-2 bg-light border rounded" style="max-width: 70%;">
                            <strong>[Audio]</strong><br>
                            <audio controls><source src="<?= $msg['contenu'] ?>" type="audio/mpeg">Non supporté</audio><br>
                            <small class="text-muted"><?= date("d/m/Y H:i", strtotime($msg['date_envoi'])) ?></small>
                        </div>
                    </div>
                <?php elseif ($msg['type'] === 'video'): ?>
                    <div class="mb-3 d-flex justify-content-start">
                        <div class="p-2 bg-light border rounded" style="max-width: 70%;">
                            <strong>[Vidéo]</strong><br>
                            <video width="200" controls><source src="<?= $msg['contenu'] ?>" type="video/mp4">Non supporté</video><br>
                            <small class="text-muted"><?= date("d/m/Y H:i", strtotime($msg['date_envoi'])) ?></small>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>

        <div class="card-footer">
            <form action="envoyer_message.php" method="post" class="d-flex align-items-center">
                <input type="hidden" name="id_client" value="<?= $id_client ?>">
                <input type="text" name="contenu" class="form-control mr-2" placeholder="Écrire une réponse..." required autofocus>
                <button type="submit" class="btn btn-success">Envoyer</button>
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="account_agent.php" class="btn btn-outline-secondary">🔙 Retour au tableau de bord</a>
    </div>
</div>

<script>
    const chatbox = document.getElementById("chatbox");
    chatbox.scrollTop = chatbox.scrollHeight;
</script>

<?php include 'footer.php'; ?>
