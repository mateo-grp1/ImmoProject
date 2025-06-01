<style>
    * {
        font-family: Arial, sans-serif;
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

    .logo-texte {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    header {
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 2px solid #d0e4ff;
        padding: 10px 0;
    }

    header h1 {
        margin: 0;
        font-size: 32px;
        color: #0074D9;
    }

    header img {
        height: 60px;
        margin-bottom: 10px;
        margin-top: 5px;
    }
</style>

<header>
    <div class="logo-texte">
        <h1><a href="Index1.php" style="color: #0074D9; text-decoration: none;">Omnes Immobilier</a></h1>
        <img src="ImagePiscine/logo.png" alt="Logo Omnes">
    </div>
</header>

<nav>
    <a href="accueil.php">Accueil</a>
    <a href="parcourir.php">Tout Parcourir</a>
    <a href="recherche.php">Recherche</a>
    <a href="rendezvous.php">Rendez-vous</a>
    <a href="login.php">Votre Compte</a>
</nav>
