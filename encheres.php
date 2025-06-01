<?php

date_default_timezone_set('Europe/Paris');


$database = "omnes_immobilier";
$db_handle = mysqli_connect('localhost', 'root', '', $database);
$db_found = mysqli_select_db($db_handle, $database);



function afficherEncheres($result) {
    echo '<div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px;">';

    while ($row = mysqli_fetch_assoc($result)) {
        $dateFin = strtotime($row['DateFin']);
        $now = time();
        $isActive = $dateFin > $now;

        echo '<div style="
                width: 300px;
                background-color: #f5faff;
                border: 1px solid #ccc;
                border-radius: 15px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                overflow: hidden;
                display: flex;
                flex-direction: column;
            ">';

        echo '<img src="' . $row['photo'] . '" alt="Photo du bien" style="width: 100%; height: 200px; object-fit: cover;">';

        echo '<div style="padding: 15px;">';
        echo '<ul style="list-style: none; padding: 0; margin: 0;">';
        echo '<li><strong>Adresse:</strong> ' . $row['adresse'] . '</li>';
        echo '<li><strong>Surface:</strong> ' . $row['dimension'] . ' m²</li>';
        echo '<li><strong>Pièces:</strong> ' . $row['pieces'] . '</li>';
        echo '<li><strong>Chambres:</strong> ' . $row['chambres'] . '</li>';
        echo '<li><strong>Prix de départ:</strong> <span style="color:green; font-weight:bold;">' . number_format($row['PrixDebut'], 0, ',', ' ') . ' €</span></li>';
        echo '<li><strong>Fin:</strong> ' . date("d/m/Y H:i", $dateFin) . '</li>';
        echo '</ul>';
        echo '</div>';

        echo '<div style="padding: 15px; text-align: center;">';
        if ($isActive) {
            echo '<a href="encherir.php?id=' . $row['id'] . '" style="
                    display: inline-block;
                    padding: 10px 15px;
                    background-color: #0074D9;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                ">Enchérir</a>';
        } else {
            echo '<div style="
                    background-color: #cccccc;
                    color: #555;
                    padding: 10px;
                    border-radius: 5px;
                    font-weight: bold;
                ">Enchère terminée</div>';
        }
        echo '</div>';

        echo '</div>';
    }

    echo '</div>';
}

if ($db_found) {
    $sql = "SELECT * FROM enchere ORDER BY DateFin ASC";
    $result = mysqli_query($db_handle, $sql);

    include 'header.php';
    
    echo "<h2 style='text-align:center; color:#0074D9;'>Biens en vente aux enchères</h2>";
    afficherEncheres($result);
    

    include 'footer.php';
} else {
    echo "Base de données non trouvée.";
}

mysqli_close($db_handle);
?>
