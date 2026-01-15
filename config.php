<?php
$host = 'mysql-luana.alwaysdata.net';
$dbname = 'luana_jeu_concours';
$user = 'luana_sql';
$password = 'Lesqlcfun011';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Configurer PDO pour afficher les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !"; 
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>