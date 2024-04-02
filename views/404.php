<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!--Meta-->
    <meta name="description" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScanAI</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/styleRes.css">
    <link rel="stylesheet" href="../assets/css/404.css">

</head>
<body>
<nav class="navLanding">
      <a id="ContLogo" href="../index.php"><img src="../assets/img/logoScanAI.png" class="logo" /></a>
      <ul class="ulNav">
       
        <a href="../index.php"><li>Home</li></a>
        <a href="../controllers/Controller.php?todo=abonnement"><li>Subscribe</li></a>
        <?php 
        if(!isset($_SESSION['user'])){
          echo '
          <a href="../controllers/Controller.php?todo=AfficherLogin"><li>Login</li></a>
          <a href="../controllers/Controller.php?todo=AfficherRegister"><li>Register</li></a>
          ';

        }else{
          echo '
          <a href="../controllers/Controller.php?todo=trad"><li>Traduction</li></a>
          ';
          echo '
          <div id="contConexion">
          <a id="ContAcc" href="../controllers/Controller.php?todo=myProfil"><li id="AccPdp">
          <span class="material-symbols-outlined">account_circle</span>
          
          </span>
          </li></a>

          <a  href="../controllers/Controller.php?todo=deconnexion"><li id="AccPdp2"><span class="material-symbols-outlined">
          logout
          </span>
          </li></a> 
          </div>
          ';
          
        }
        ?>
      </ul>
    </nav>



        <main>
        <h1>404</h1>
<h2>-  Error Not Found  -</h2>
        </main>
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