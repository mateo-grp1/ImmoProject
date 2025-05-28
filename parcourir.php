<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tout Parcourir - Omnes Immobilier</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      padding: 30px;
      background-color: white;
    }

    .categorie {
      margin-bottom: 30px;
      padding: 20px;
      background-color: #e6f0ff;
      border-radius: 10px;
      border-left: 5px solid #0074D9;
    }

    .categorie h2 {
      color: #0074D9;
      margin-top: 0;
    }

    .categorie a {
      display: inline-block;
      margin-top: 10px;
      background-color: #0074D9;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <?php include('header.html'); ?>

  <div class="container">

    <div class="categorie">
      <h2>🏠 Immobilier résidentiel</h2>
      <p>Maisons, appartements, duplex, condos, etc.</p>
      <a href="residentiel.php">Voir les biens</a>
    </div>

    <div class="categorie">
      <h2>🏢 Immobilier commercial</h2>
      <p>Bureaux, commerces, hôtels, restaurants, hôpitaux, etc.</p>
      <a href="commercial.php">Voir les biens</a>
    </div>

    <div class="categorie">
      <h2>🌾 Terrains</h2>
      <p>Terrains vacants, agricoles, boisés, etc.</p>
      <a href="terrain.php">Voir les biens</a>
    </div>

    <div class="categorie">
      <h2>🏡 Appartements à louer</h2>
      <p>Locations de courte ou longue durée</p>
      <a href="locations.php">Voir les biens</a>
    </div>

    <div class="categorie">
      <h2>🔨 Vente par enchère</h2>
      <p>Propriétés en vente au plus offrant</p>
      <a href="encheres.php">Voir les enchères</a>
    </div>

  </div>

  <?php include('footer.html'); ?>

</body>
</html>
