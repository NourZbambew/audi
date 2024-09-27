<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'nav.php';
include 'user.php';

$sql = "SELECT * FROM `vehicul`";
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // On récupère les résultats ici
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="modele.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audi Sport | Les modèles Sport</title>
</head>
<body>
    <div class='div1'>
        <h1 class='voir'>Voir tous les modèles</h1>
    </div>
<form action="modele.php" method="get"></form>
    <div class='div2'>
        <div class='div3'>
            <a href="modele.php?a1" class='a'>A1</a>
            <a href="#2" class='a'>A3</a>
            <a href="#3" class='a'>A4</a>
            <a href="#4" class='a'>A5</a>
            <a href="#5" class='a'>A6</a>
            <a href="#6" class='a'>A7</a>
            <a href="#7" class='a'>A8</a>
        </div>
    </div>
    </form>
    
       
    </div>
    <?php
if (!empty($results)) { 
    foreach ($results as $vehicul) { ?>
        <div class='cardc'>
        <div class='div4'>
            <img class='img1'src="<?php echo $vehicul['photo']; ?>" alt="Image de <?php echo $vehicul['nom']; ?>">
        </div>
        <div class='card'>
            
            <h2><?php echo $vehicul['nom']; ?></h2>
            <br>
            <br>
            <br>

            <h2>Prix : <?php echo $vehicul['prix']; ?> €</h2>
            <br>
            <br>
            <br>
            <h2> <?php echo $vehicul['description']; ?> </h2>

        </div>
        </div>
    <?php } 
} else {
    echo "<p>Aucun véhicule trouvé.</p>";
}
?>
            
</body>
</html>