<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Merci pour votre achat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #d0e4ff, #ffffff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .thank-you-box {
            background-color: #fff;
            padding: 50px 40px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 116, 217, 0.2);
            max-width: 600px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            color: #0074D9;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: #555;
        }

        .btn-custom {
            margin-top: 30px;
            padding: 10px 30px;
            font-size: 1.1em;
            border-radius: 8px;
        }

        .check-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="thank-you-box">
    <div class="check-icon">✅</div>
    <h1>Merci pour votre achat !</h1>
    <p>Votre commande a bien été enregistrée et vos informations ont été mises à jour.</p>
    <a href="account_client.php" class="btn btn-success btn-custom">Voir mon compte</a>
    <a href="accueil.php" class="btn btn-outline-primary btn-custom ml-2">Retour à l'accueil</a>
</div>

</body>
</html>
