<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styleRes.css" >

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ScanAI</title>
  </head>
  <body>
     <!-- Barre de navigation -->
     <nav class="navLanding">
      <a id="ContLogo" href="index.php"><img src="logoScanAI.png" class="logo" /></a>
      <ul class="ulNav">
        <a href="login.php"><li>Login</li></a>
        <a href="register.php"><li>Register</li></a>
        <a href="abo.php"><li>Subscribe</li></a>
        <a href="profil.php"><li>Profile</li></a>
      </ul>
    </nav>
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
          <input type="text" placeholder="exemple@gmail.com" id="email" />
          <label for="password" id="elementChange">Password</label>
          <input type="password" placeholder="Enter your password" id="password">
          <label for="passwordConfirm" id="passwordConfirmChange">Password Confirm</label>
          <input type="password" placeholder="Repeat the password" id="passwordConfirm" />
          <button class="btnLogin">Update</button>
          <!-- Lien pour rediriger vers la page de connexion -->
          <a href="login.php" style="color: white;">You dont have an account ? Register</a>
        </form>
        </section>

        <footer>
      
      <ul>
          <li><a href='#'>Terms</a></li>
          <li><a href='#'>Privacy</a></li>
          <li><a href='#'>Contact</a></li>
      </ul>
      <p>&copy; Copyright 2024 ScanAI. Tous droits réservés.</p>

</footer>
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

  </body>
</html>
