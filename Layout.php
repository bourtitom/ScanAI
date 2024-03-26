<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styleRes.css" >
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ScanAI</title>
  </head>
  <body>
    <nav class="navLanding">
      <a id="ContLogo" href="index.php"><img src="logoScanAI.png" class="logo" /></a>
      <ul class="ulNav">
       
        <a href="index.php"><li>Home</li></a>
        <a href="abo.php"><li>Subscribe</li></a>
        <?php 
        if(!isset($_SESSION['user'])){
          echo '
          <a href="login.php"><li>Login</li></a>
          <a href="register.php"><li>Register</li></a>
          ';

        }else{
          echo '<a  href="logout.php"><li id="AccPdp"><span class="material-symbols-outlined">
          logout
          </span>
          </li></a> ';
          echo '<a id="ContAcc" href="profil.php"><li id="AccPdp"><img class="pdp" src="pdpTom.png" alt="photo de profil">
          </li></a> ';
       
        }
        ?>
      </ul>
    </nav>
 

    <main>
        <?php echo $content; ?>

    </main>
   

    <footer>
      
              <ul>
                  <li><a href='#'>Terms</a></li>
                  <li><a href='#'>Privacy</a></li>
                  <li><a href='#'>Contact</a></li>
              </ul>
              <p>&copy; Copyright 2024 ScanAI. Tous droits réservés.</p>
  
  </footer>

    <script src="particles.js"></script>
    <script>
      particlesJS.load("particles-js", "particlesjs-config.json", function () {
        console.log("callback - particles.js config loaded");
      });
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
  const parent = document.querySelector(".parent");
  const mouseFollower = document.querySelector(".mouse-follower");

  parent.addEventListener("mouseenter", function() {
    mouseFollower.style.display = "block";
  });

  parent.addEventListener("mouseleave", function() {
    mouseFollower.style.display = "none";
  });

  document.addEventListener("mousemove", function(e) {
    const parentRect = parent.getBoundingClientRect();
    const mouseX = e.pageX;
    const mouseY = e.pageY;

    const parentLeft = parentRect.left + window.pageXOffset;
    const parentTop = parentRect.top + window.pageYOffset;
    const parentRight = parentRect.right + window.pageXOffset - mouseFollower.offsetWidth;
    const parentBottom = parentRect.bottom + window.pageYOffset - mouseFollower.offsetHeight;

    if (mouseX >= parentLeft && mouseX <= parentRight && mouseY >= parentTop && mouseY <= parentBottom) {
      let adjustedMouseX = mouseX - parentLeft;
      let adjustedMouseY = mouseY - parentTop;

      mouseFollower.style.left = adjustedMouseX + "px";
      mouseFollower.style.top = adjustedMouseY + "px";
    }
  });
});



    </script>
  </body>
</html>
<?php 
unset($_SESSION['error']);
unset($_SESSION['old']);
