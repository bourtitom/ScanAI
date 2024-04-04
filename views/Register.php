<?php include("header.php"); ?>
<main>
<section class="registerPage">
  
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form class="Formed"  method="POST" action="../controllers/Controller.php">
    <h3>Register Here</h3>
    <input type='hidden' name='todo' value='CreerCompte'>
    <?php
          if (isset($_SESSION['error'])) {
            echo '<div class="error">' . $_SESSION['error'] .'</div>' ;
            unset($_SESSION['error']);  // pour supprimer le message d'erreur après l'avoir affiché
          }
          ?>
    <label for="email">Email</label>
    <input type="text" placeholder="Enter your mail" name="email" id="email" />

    <label for="password" id="elementChange">Password</label>
    <input type="password" placeholder="Enter your password" name="password" id="password">

    <label for="passwordConfirm" id="passwordConfirmChange">Password Confirm</label>
    <input type="password" placeholder="Repeat the password" name="passwordConfirm" id="passwordConfirm" />

    <button class="btnLogin">Register</button>
    <div class="social">
      <div class="go"><i class="fab fa-google"></i> Google</div>
      <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
    </div>
    <a href="../controllers/Controller.php?todo=AfficherLogin" style="color: white;">Have an account ? Login</a>

  </form>
</section>



  <script>
const elementChange = document.getElementById("elementChange");
const inputVal = document.getElementById("password");
const passwordConfirm = document.getElementById("passwordConfirm");
const innerPassConf = document.getElementById("passwordConfirmChange");

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

function checkPasswordStrength(password) {
const strongRegex = new RegExp(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*(),.?\":{}|<>])(?=.{8,})"
);

if (strongRegex.test(password)) {
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

passwordConfirm.addEventListener("input", function () {
verifPasswordConfirm(this);
});

inputVal.addEventListener("input", function () {
checkPasswordStrength(this.value);
});

  </script>
</main>
<?php include("footer.php"); ?>
