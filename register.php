
<?php 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
  </head>
  <body>
    <section class="registerPage">
    <nav class="navLanding">
      
      <a href="index.php"><img src="logoScanAI.png" class="logo" /></a>
      <ul class="ulNav">
        <a href="login.php"><li>Login</li></a>
        <a href="register.php"><li>Register</li></a>
        <a href="abo.php"><li>Subscribe</li></a>
        <a href="profil.php"><li>Profile</li></a>
      </ul>
    </nav>
      <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
      </div>
      <form style="height: 650px;" method="POST" action="core/processors/processRegister.php">
        <h3>Register Here</h3>

        <label for="email">Email</label>
        <input type="text" placeholder="Enter your mail" id="email" />

        <label for="password" id="elementChange">Password</label>
        <input type="password" placeholder="Enter your password" id="password">

        <label for="passwordConfirm" id="passwordConfirmChange">Password Confirm</label>
        <input type="password" placeholder="Repeat the password" id="passwordConfirm" />

        <button class="btnLogin">Register</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i> Google</div>
          <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
        <a href="login.php" style="color: white;">You dont have an account ? Register</a>
      </form>
    </section>

    <footer>
      <div class='container'>
      <div class='row'>
          <div class='col-md-12'>
              <ul>
                  <li><a href='#'>Terms</a></li>
                  <li><a href='#'>Privacy</a></li>
                  <li><a href='#'>Contact</a></li>
                  <li><a href='#'></a></li>
                  <p>&copy; Copyright 2024</p>
              </ul>
          </div>
      </div>
      </div>
  </footer>



      <script>
const elementChange = document.getElementById("elementChange");
const inputVal = document.getElementById("password");
const passwordConfirm = document.getElementById("passwordConfirm");
const innerPassConf = document.getElementById("passwordConfirmChange");

function verifPasswordConfirm(passwordConfirm) {
  if (passwordConfirm.value === inputVal.value) {
    innerPassConf.innerHTML = "Les mot de passes correspondent";
    innerPassConf.style.color = "#93cf13";
    
  } else if (passwordConfirm.value == 0) {
    innerPassConf.innerHTML = "Password Confirm";
    innerPassConf.style.color = "white";

  } else {
    innerPassConf.innerHTML = "Les mot de passes ne correspondent pas";
    innerPassConf.style.color = "red"
  }
}

function checkPasswordStrength(password) {
    if (password.length >= 8) {
      elementChange.innerHTML = "Mot de passe fort";
      elementChange.style.color = "#93cf13";
    }
    else if (password.length >= 6) {
      elementChange.innerHTML = "Mot de passe moyen";
      elementChange.style.color = "yellow";
    }
    else if (password.length > 0) {
      elementChange.innerHTML = "Mot de passe faible";
      elementChange.style.color = "red";
    } else {
      elementChange.innerHTML = "Password";
      elementChange.style.color = "white";
    }
}

passwordConfirm.addEventListener("input", function() {
    verifPasswordConfirm(this);
});

inputVal.addEventListener("input", function() {
    checkPasswordStrength(this.value);
});
      </script>
  </body>
</html>
