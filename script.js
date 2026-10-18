const formulaire = document.getElementById("formulaire");
const champNom = document.getElementById("nom");
const champEmail = document.getElementById("email");
const champMessage = document.getElementById("message");
const zoneErreur = document.getElementById("erreur");

formulaire.addEventListener("submit", function (evenement) {

  // On récupère ce qui est écrit. trim() enlève les espaces inutiles.
  const nom = champNom.value.trim();
  const email = champEmail.value.trim();
  const message = champMessage.value.trim();

  // On vérifie les champs un par un
  if (nom === "") {
    zoneErreur.textContent = "Écris ton nom.";
    evenement.preventDefault();   // bloque l'envoi du formulaire
    return;                       // on arrête la vérification ici
  }

  // Un email correct contient au moins un "@"
  if (!email.includes("@")) {
    zoneErreur.textContent = "L'email n'est pas valide (il manque le @).";
    evenement.preventDefault();
    return;
  }

  if (message.length < 10) {
    zoneErreur.textContent = "Ton message doit faire au moins 10 caractères.";
    evenement.preventDefault();
    return;
  }

  // Si on arrive ici, tout est bon : on efface l'erreur
  // et le formulaire part vers traitement.php
  zoneErreur.textContent = "";
});