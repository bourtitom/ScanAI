
<?php 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styleRes.css" >

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body>
  <nav class="navLanding">
      <a id="ContLogo" href="index.php"><img src="logoScanAI.png" class="logo" /></a>
      <ul class="ulNav">
        <a href="login.php"><li>Login</li></a>
        <a href="register.php"><li>Register</li></a>
        <a href="abo.php"><li>Subscribe</li></a>
        <a href="profil.php"><li>Profile</li></a>
      </ul>
    </nav>
    <section class="loginPage">

      <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
      </div>
      <form action="core/processors/processLogin.php" method="POST">
        <h3 class="UnderTitle">Login Here</h3>

        <label for="username">Email</label>
        <input type="text" name="email" placeholder="Email or Phone" id="username" />

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" />

        <button class="btnLogin">Log In</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i> Google</div>
          <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
        <a href="register.php" style="color: white;">Have an account ? Login</a>
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
  </body>
</html>
