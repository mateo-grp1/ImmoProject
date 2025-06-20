<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil - Omnes Immobilier</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5faff;
    }

    header {
      background-color: #ffffff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      border-bottom: 2px solid #d0e4ff;
    }

    header h1 {
      color: #0074D9;
      font-size: 32px;
      margin: 0;
    }

    header img {
      height: 60px;
    }

    nav {
      background-color: #d0e4ff;
      text-align: center;
      padding: 10px;
    }

    nav a {
      text-decoration: none;
      background-color: #e4eeff;
      color: #0074D9;
      border: 1px solid #0074D9;
      padding: 10px 20px;
      margin: 5px;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s;
    }

    nav a:hover {
      background-color: #0074D9;
      color: white;
    }

    .content {
      max-width: 1000px;
      margin: auto;
      padding: 40px 20px;
    }

    .event {
      background-color: #eaf4ff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }

    .event h2 {
      color: #0074D9;
    }

    .carousel {
      display: flex;
      gap: 15px;
      overflow-x: auto;
      padding: 10px 0;
    }

    .carousel img {
      height: 180px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    iframe {
      width: 100%;
      height: 300px;
      border: none;
      border-radius: 10px;
      margin-top: 30px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #eaeaea;
      color: #0074D9;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <header>
    <h1><a href="index1.html">Omnes Immobilier</a></h1>
    <img src="images/logo.png" alt="Logo Omnes">
  </header>

   <nav>
    <a href="accueil.php">Accueil</a>
    <a href="parcourir.php">Tout Parcourir</a>
    <a href="recherche.php">Recherche</a>
    <a href="rendezvous.php">Rendez-vous</a>
    <a href="compte.php">Votre Compte</a>
  </nav>

  <div class="content">

    <div class="event">
      <h2>🎉 Évènement de la semaine</h2>
      <p>➡️ Ce samedi, profitez d'une journée portes ouvertes dans notre nouvelle résidence à Bordeaux. Venez rencontrer nos agents et visiter des biens exclusifs !</p>
    </div>

    <div class="carousel">
      <img src="images/maison1.jpg" alt="Maison 1">
      <img src="images/appartement1.jpg" alt="Appartement">
      <img src="images/terrain1.jpg" alt="Terrain">
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=..."></iframe>

  </div>

  <footer>
    Omnes Immobilier – © 2025 – contact@omnesimmobilier.fr – +33 01 23 45 67 89
  </footer>

</body>
</html>
