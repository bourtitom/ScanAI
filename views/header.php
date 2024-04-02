
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!--Meta-->
    <meta name="description" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/header.css">
    <title>ScanAI</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/styleRes.css">
</head>
<body>
<header>
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

</header>

<button class="chatbot-toggler">
    <span class="material-symbols-outlined">mode_comment</span>
    <span class="material-symbols-outlined">close</span>
    </button>
      <div class="chatbot">
        <header>
          <h2>ScanAi Helper</h2>
          <span class="close-btn material-symbols-outlined">close</span>
          <button class="clear-chat-btn">Effacer le chat</button>
        </header>
        <ul class="chatbox">
          <li class="chat incoming">
            <span class="material-symbols-outlined">smart_toy</span>
            <p>Hey <br>asks a question that contains scanai to start !</p>
          </li>
        </ul>
        <div class="chat-input">
          <textarea placeholder="Enter a message..." required></textarea>
          <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
      </div>
      <script src="../assets/js/chatbot.js"></script>