<?php
// TRAITEMENT PHP : Sauvegarde de la photo
$message = "";

// Si le formulaire d'upload est soumis
"jsp j'aime pas tant que ca'"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Participer - Concours La Motte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1> Espace de Compétition</h1>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="concours.php">Participer & Voter</a>
        </nav>
    </header>

    <main class="classe-chef-1">

        <h2 class="classe-chef-2">1. Soumettre votre photo</h2>
        
        <?php if($message != ""): ?>
            <p style="background: #e8f5e9; padding: 10px; border-radius: 4px;"><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="concours.php" method="post" enctype="multipart/form-data" style="margin-bottom: 40px;">
            <label for="nom">Votre nom :</label><br>
            <input type="text" name="nom" required style="margin-bottom: 10px;"><br>
            
            <label for="photoOiseau">Choisir une photo (JPG, PNG) :</label><br>
            <input type="file" name="photoOiseau" id="photoOiseau" required><br><br>
            
            <button type="submit" name="upload" class="classe-chef-3">Envoyer ma photo</button>
        </form>

        <hr>

        <h2 class="classe-chef-2">2. Voter pour la meilleure photo</h2>
        <p>Cochez votre photo préférée et validez en bas de page.</p>

        <form action="concours.php" method="post">
            <div class="classe-chef-4">
                <?php
                // SCAN DU DOSSIER UPLOADS POUR AFFICHER LES IMAGES
                $images = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                
                if (count($images) > 0) {
                    foreach($images as $image) {
                        echo '<div class="photo-item">';
                        echo '  <img src="'.$image.'" alt="Oiseau concours">';
                        // Bouton radio pour le vote
                        echo '  <div style="margin-top: 5px;">';
                        echo '    <input type="radio" name="vote_photo" value="'.$image.'"> Je vote pour celle-ci';
                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Aucune photo pour le moment. Soyez le premier !</p>";
                }
                ?>
            </div><div></div>

            
            
            <div style="margin-top: 30px; text-align: center;">
                <button type="submit" name="voter" class="classe-chef-3">Valider mon vote</button>
            </div>
            
            <?php
            // Petit script PHP simple pour confirmer le vote (simulation)
            if (isset($_POST['voter']) && isset($_POST['vote_photo'])) {
                echo '<p style="text-align:center; color:green; font-weight:bold; margin-top:10px;">Merci ! Votre vote pour '.basename($_POST['vote_photo']).' a été pris en compte.</p>';
            }
            ?>
        </form>

    </main>

</body>
</html>