<?php


// On vérifie que la page a bien été ouverte via le formulaire (méthode POST).
// Sinon, on renvoie la personne vers le formulaire.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.html");
    exit;
}

// $_POST contient les données envoyées. Les noms entre crochets
// trim() enlève les espaces inutiles.
// htmlspecialchars() protège le site contre le code malveillant.
$nom     = htmlspecialchars(trim($_POST["nom"]));
$email   = htmlspecialchars(trim($_POST["email"]));
$message = htmlspecialchars(trim($_POST["message"]));

// Même si JavaScript a déjà vérifié, on revérifie en PHP :

if ($nom === "" || $email === "" || $message === "") {
    $succes = false;
} else {
    $succes = true;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message reçu</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>Mon premier site</h1>
    <nav>
      <a href="index.html">Accueil</a>
      <a href="contact.html">Contact</a>
    </nav>
  </header>

  <main>
    <?php if ($succes) { ?>

      <h2>Merci <?php echo $nom; ?> !</h2>
      <p>Ton message a bien été reçu.</p>
      <p><strong>Email :</strong> <?php echo $email; ?></p>
      <p><strong>Message :</strong> <?php echo $message; ?></p>

    <?php } else { ?>

      <h2>Oups !</h2>
      <p>Tous les champs sont obligatoires.</p>
      <a href="contact.html">← Retourner au formulaire</a>

    <?php } ?>
  </main>

  <footer>
    <p>© 2026 - Mon premier site</p>
  </footer>

</body>
</html>