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
        
    <!-- Conteneur d'abonnement -->
    <div class="containerAbo">
      <!-- Titre de la section -->
      <h1 id="AboTitle">
        Subscription
      </h1>
      <!-- Section d'abonnement -->
      <section class="SectionAbo">
        <!-- Article pour l'abonnement classique -->
        <article class="ContAbo">
          <img class="logoArt" src="gold.png" alt="">
          <h2>Classic</h2>
          <p>€5/month</p>
          <ul>
            <li>25 requests/day</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
        <!-- Article pour l'abonnement premium -->
        <article class="ContAbo">
          <img class="logoArt" src="ruby.png" alt="">
          <h2>Premium</h2>
          <p>€10/month</p>
          <ul>
            <li>50 requests/day</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
        <!-- Article pour l'abonnement King -->
        <article class="ContAbo">
          <img class="logoArt" src="corwn.png" alt="">
          <h2>King</h2>
          <p>€15/month</p>
          <ul>
            <li>Unlimited</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
      </section>
    </div>


     <!-- Pied de page -->
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

