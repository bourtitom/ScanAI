<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ScanAI</title>
  </head>
  <body>
   
     <!-- Barre de navigation -->
     <nav class="navLanding">
      <a href="login.php"><li>Login</li></a>
      <a href="register.php"><li>Register</li></a>
      <a href="abo.php"><li>Subscribe</li></a>
      <a href="profil.php"><li>Profile</li></a>
    </nav>

   <!-- Conteneur de titre et de formulaire -->
   <div class="containerTitle">
    <!-- Formulaire de vérification -->
    <form id="FLogin" action="/login/" method="post">
      <div class="containerFormCheck">
        <!-- Titre principal -->
        <h1 class="mainTitle" id="CheckTitle">
          Check your account
        </h1>
        <!-- Boîte pour la saisie du code de confirmation -->
        <div id="myBox">
          <!-- Cinq champs de saisie du code -->
          <input type="text" class="confirmationCode" name="confirmationCode" maxlength="1"  pattern="\d|[A-Za-z]" required>
          <input type="text" class="confirmationCode" name="confirmationCode" maxlength="1"  pattern="\d|[A-Za-z]" required>
          <input type="text" class="confirmationCode" name="confirmationCode" maxlength="1"  pattern="\d|[A-Za-z]" required>
          <input type="text" class="confirmationCode" name="confirmationCode" maxlength="1"  pattern="\d|[A-Za-z]" required>
          <input type="text" class="confirmationCode" name="confirmationCode" maxlength="1"  pattern="\d|[A-Za-z]" required>
        </div>
        <!-- Bouton de soumission du formulaire -->
        <button id="btnSubmite" type="submit">Confirmer</button>
      </div>
    </form>
  </div>


  <!-- Pied de page -->
  <footer>
    <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <ul>
            <!-- Liens de navigation du pied de page -->
            <li><a href='#'>Terms</a></li>
            <li><a href='#'>Privacy</a></li>
            <li><a href='#'>Contact</a></li>
            <li><a href='#'></a></li>
            <!-- Message de droits d'auteur -->
            <p>&copy; Copyright 2024 ScanAI. Tous droits réservés.</p>
          </ul>
        </div>
      </div>
    </div>
  </footer>





    <!-- Inclusion du script pour les particules -->
    <script src="../particles.js"></script>
    <!-- Script JavaScript pour la fonctionnalité de saisie du code de confirmation -->
    <script>
      // Sélection de tous les champs de saisie du code
      const inputs = document.querySelectorAll('#myBox .confirmationCode');
      inputs.forEach((input, i) => {
        // Ajout d'un écouteur d'événements pour la touche "keyup"
        input.addEventListener('keyup', (e) => {
          // Si la longueur de la valeur saisie est égale à la longueur maximale du champ
          if(e.target.value.length === e.target.maxLength) {
            // Sélection du champ de saisie suivant s'il existe
            const nextInput = inputs[i + 1];
            if(nextInput) {
              nextInput.focus();
            }
          }
        });
        // Ajout d'un écouteur d'événements pour l'entrée de texte
        input.addEventListener('input', (e) => {
          // Conversion de la valeur saisie en majuscules
          e.target.value = e.target.value.toUpperCase();
        });
      });
    </script> 
    <!-- Chargement de la configuration des particules -->
    <script>
      particlesJS.load("particles-js", "particlesjs-config.json", function () {
        console.log("callback - particles.js config loaded");
      });
    </script>
  </body>
</html>
