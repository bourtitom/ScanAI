<?php include("header.php"); ?>

  <!-- Arrière-plan -->
  <div class="background">
    <!-- Formes de fond -->
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <section class="YourProfil">
    
        <!-- Formulaire d'inscription -->
        <form >
          <h3>Your Profil</h3>
          <label for="email">Email</label>
          <input type="text" value="<?php echo $_SESSION['user']['email']; ?>" id="email" />
          <label for="password" id="elementChange">Password</label>
          <input type="password" placeholder="Enter your password" id="password">
          <label for="passwordConfirm" id="passwordConfirmChange">Password Confirm</label>
          <input type="password" placeholder="Repeat the password" id="passwordConfirm" />
          <button class="btnLogin">Update</button>
          <!-- Lien pour rediriger vers la page de connexion -->
          <a href="../controllers/Controller.php?todo=deconnexion" style="color: white;">Your leave ? logout</a>
        </form>
        </section>

 
    <!-- Script JavaScript -->
    <script>
      // Sélection des éléments nécessaires
      const elementChange = document.getElementById("elementChange");
      const inputVal = document.getElementById("password");
      const passwordConfirm = document.getElementById("passwordConfirm");
      const innerPassConf = document.getElementById("passwordConfirmChange");

      // Fonction pour vérifier si les mots de passe correspondent
      function verifPasswordConfirm(passwordConfirm) {
        if (passwordConfirm.value === inputVal.value) {
          innerPassConf.innerHTML = "Les mots de passe correspondent";
          innerPassConf.style.color = "#93cf13";
        } else if (passwordConfirm.value == 0) {
          innerPassConf.innerHTML = "Password Confirm";
          innerPassConf.style.color = "white";
        } else {
          innerPassConf.innerHTML = "Les mots de passe ne correspondent pas";
          innerPassConf.style.color = "red";
        }
      }

      // Fonction pour vérifier la force du mot de passe
      function checkPasswordStrength(password) {
        if (password.length >= 8) {
          elementChange.innerHTML = "Mot de passe fort";
          elementChange.style.color = "#93cf13";
        } else if (password.length >= 6) {
          elementChange.innerHTML = "Mot de passe moyen";
          elementChange.style.color = "yellow";
        } else if (password.length > 0) {
          elementChange.innerHTML = "Mot de passe faible";
          elementChange.style.color = "red";
        } else {
          elementChange.innerHTML = "Password";
          elementChange.style.color = "white";
        }
      }

      // Événement d'entrée pour le champ de confirmation du mot de passe
      passwordConfirm.addEventListener("input", function() {
        verifPasswordConfirm(this);
      });

      // Événement d'entrée pour le champ de mot de passe
      inputVal.addEventListener("input", function() {
        checkPasswordStrength(this.value);
      });
    </script>
<?php include("footer.php"); ?>
