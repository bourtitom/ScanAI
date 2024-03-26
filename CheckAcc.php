<?php
ob_start();
?>

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
<?php 
$content = ob_get_clean();
require 'layout.php';
