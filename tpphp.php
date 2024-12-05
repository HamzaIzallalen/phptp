<?php
//TD numero uno
//Ex1

$etudiant = [
    'nom' => 'Izallalen','prénom' => 'Hamza','matricule' => '151560'
];
echo "Nom : {$etudiant['nom']}, Prénom : {$etudiant['prénom']}, Matricule : {$etudiant['matricule']}";
// Ex2
$etudiant['note'] = 20;
$etudiant['note'] = 20;
echo "Note  : {$etudiant['note']}";
// Ex3
$produits = [
    'ananas' => 2,
    'mange' => 10,
    'lemon' => 9.5
];
foreach ($produits as $nom => $prix) {
    echo "Produit : $nom, Prix : $prix €<br>";
}
// Ex4
$scores = [
   'omar' => 17,'ahmad' => 12,'salah' => 10,5,'munir' => 16,
    'youssef' => 19
];
$moyenne = array_sum($scores) / count($scores);
echo "Moyenne des scores : $moyenne<br>";
// Ex5
$pays = [
    'Russie' => 77000000,
    'Usa' => 30000000,
    'France' => 34400000
];
arsort($pays);
foreach ($pays as $nom => $population) {
    echo "Pays : $nom, Population : $population<br>";
}
?>
<p>Exercice6</p>
<form method="POST" action="">
    Nom : <input type="text" name="nom" required><br>
    Age : <input type="number" name="age" required><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['age'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    if ($age !== false) {
        echo "Bienvenue Mr(Mme) $nom, vous avez $age ans !<br>";
    } else {
        echo "Erreur : L'age doit être un entier valide.<br>";
    }
}
?>
<p>Exercice7</p>
<form method="POST" action="">
    Nom : <input type="text" name="nom" required><br>
  Age : <input type="number" name="age" required><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['age'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    if ($age !== false && $age > 0) {
        echo "Bienvenue, $nom, vous avez $age ans !<br>";
    } else {
        echo "Erreur : L'age doit être un entier positif.<br>";
    }
}
?>
<p>Exercice8</p>
<form method="POST" action="">
    Couleur préférée :
    <select name="couleur">
        <option value="rouge">Rouge</option>
        <option value="vert">Vert</option>
        <option value="bleu">Bleu</option>
    </select><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['couleur'])) {
    $couleur = htmlspecialchars($_POST['couleur']);
    echo "Votre couleur préférée est : $couleur<br>";
}
?>
<p>Exercice9</p>
<form method="GET" action="">
    Nombre 1 : <input type="number" name="nombre1" required><br>
    Nombre 2 : <input type="number" name="nombre2" required><br>
    <button type="submit">Calculer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombre1'], $_GET['nombre2'])) {
    $nombre1 = filter_var($_GET['nombre1'], FILTER_VALIDATE_INT);
    $nombre2 = filter_var($_GET['nombre2'], FILTER_VALIDATE_INT);
    if ($nombre1 !== false && $nombre2 !== false) {
        $somme = $nombre1 + $nombre2;
        echo "La somme est : $somme<br>";
    } else {
        echo "Erreur : Veuillez entrer des nombres valides.<br>";
    }
}
?>
<p>Exercice10</p>
<form method="POST" action="">
    Type de compte :
    <select name="type_compte">
        <option value="Administrateur">Administrateur</option>
        <option value="Utilisateur">Utilisateur</option>
    </select><br>
    <button type="submit">Envoyer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type_compte'])) {
    $type_compte = htmlspecialchars($_POST['type_compte']);
    if ($type_compte === 'Administrateur') {
        echo "Bienvenue, administrateur !<br>";
    } elseif ($type_compte === 'Utilisateur') {
        echo "Bienvenue, utilisateur simple !<br>";
    } else {
        echo "Erreur : Type de compte non valide.<br>";
    }
}
//td numero dos
?>
<?php
// Ex1  
$employes = [
    ['nom' => 'hajar', 'poste' => 'developpeur', 'salaire' => 13000],
    ['nom' => 'salah', 'poste' => 'designer', 'salaire' => 11000],
    ['nom' => 'amin', 'poste' => 'chef de projet', 'salaire' => 13600],
    ['nom' => 'fatima', 'poste' => 'secraitaire', 'salaire' => 7000],
    ['nom' => 'munir', 'poste' => 'technicien', 'salaire' => 6500],
];
function calculer($employes) {
    $total = array_sum(array_column($employes, 'salaire'));
    return $total / count($employes);
}
echo "Salaire moyen : " . calculer($employes) . " €\n";
// Ex2 
$employesAssoc = [
    'hajar'=> ['poste' => 'developpeur', 'salaire' => 13000],
    'salah' => ['poste' => 'designer', 'salaire' => 11000],
    'amin' => ['poste' => 'chef de projet', 'salaire' => 13600],
    'fatima'=> ['poste' => 'secraitaire', 'salaire' => 7000],
    'munir'=> ['poste' => 'technicien', 'salaire' =>  6500],
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    if (array_key_exists($nom, $employesAssoc)) {
        $info = $employesAssoc[$nom];
        echo "Nom : $nom, Poste : {$info['poste']}, Salaire : {$info['salaire']} €\n";
    } else {
        echo "Employé non trouve.\n";
    }
}
?>
<form method="POST" action="">
    Entrez un nom : <input type="text" name="nom" required>
    <button type="submit">Rechercher</button>
</form>
<?php
// Ex3  
$utilisateurs = [
    ['email' => 'hamzaizallalen12@gmail.com', 'password' => 'allstarbattle'],
    ['email' => 'ayanarjiss03@gmail.com', 'password' => '123pizzahello'],
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $found = false;
    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email && $utilisateur['password'] === $password) {
            $found = true;
            break;
        }
    }
    echo $found ? "Connexion reussie." : "Identifiants incorrects.";
}
?>
<form method="POST" action="">
    Email : <input type="email" name="email" required><br>
    Mot de passe : <input type="password" name="password" required><br>
    <button type="submit">Connexion</button>
</form>
<?php
// Ex4 
$panier = [
    ['nom' => 'casque', 'quantite' => 6, 'prix' =>90],
    ['nom' => 'pochete', 'quantite' =>3, 'prix' => 80],
    ['nom' => 'chargeur', 'quantite' => 1, 'prix' => 100],
];
$total = array_reduce($panier, function ($carry, $item) {
    return $carry + $item['quantite'] * $item['prix'];
}, 0);
echo "Total du panier : $total ";
echo '<br>';
// Ex5  
$commentaires = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $commentaires[] = ['texte' => $commentaire, 'date' => date('Y-m-d H:i:s')];
}
foreach ($commentaires as $c) {
    echo "{$c['texte']} ({$c['date']})<br>";
}
?>
<form method="POST" action="">
    Commentaire : <textarea name="commentaire" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>
<?php
// Ex6  
$villes = [
    'Fes' => 40,
    'Rio' => 33,
    'Rome' => 20,
    'Cairo' => 47,
    'Tokyo' => 17,
];
$ville_max = array_keys($villes, max($villes))[0];
echo "La ville la plus chaude est $ville_max avec une température basse de {$villes[$ville_max]}°C.\n";
// Exercice 7 : Lecture d'un fichier CSV
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier_csv'])) {
    $file = $_FILES['fichier_csv']['tmp_name'];
    $produits = array_map('str_getcsv', file($file));
    echo "<table border='1'>";
    foreach ($produits as $produit) {
        echo "<tr><td>{$produit[0]}</td><td>{$produit[1]}</td><td>{$produit[2]}</td></tr>";
    }
    echo "</table>";
}
?>
<form method="POST" enctype="multipart/form-data">
    Fichier CSV : <input type="file" name="fichier_csv" required><br>
    <button type="submit">Importer</button>
</form>
<?php
// Ex8  
$produits = [
    'pc' => 10000,
    'souris'=> 500,
    'cpu'=> 4000,
    'television' => 60000,
    'ecran4k'=> 2000,
    'carte graphique' => 5000,

];
$total = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produits'])) {
    foreach ($_POST['produits'] as $produit) {
        $total += $produits[$produit];
    }
    echo "Total : $total €<br>";
}
?>
<form method="POST">
    <?php foreach ($produits as $nom => $prix): ?>
        <input type="checkbox" name="produits[]" value="<?= $nom ?>"> <?= $nom ?> - <?= $prix ?> €<br>
    <?php endforeach; ?>
    <button type="submit">Calculer</button>
</form>
<?php
// Ex9  
$etudiants = [
    'said' => ['Maths' => 15, 'Physique' => 18, 'Chimie' => 9],
    'hamza' => ['Maths' => 20, 'Physique' => 19, 'Chimie' => 20],
];

foreach ($etudiants as $nom => $notes) {
    $moyenne = array_sum($notes) / count($notes);
    echo "$nom : Moyenne = $moyenne<br>";
}
?>