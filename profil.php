<?php
ob_start();
?>

?>
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
          <input type="text" placeholder=""/>
          <label for="password" id="elementChange">Password</label>
          <input type="password" placeholder="Enter your password" id="password">
          <label for="passwordConfirm" id="passwordConfirmChange">Password Confirm</label>
          <input type="password" placeholder="Repeat the password" id="passwordConfirm" />
          <button class="btnLogin">Update</button>
          <!-- Lien pour rediriger vers la page de connexion -->
          <a href="logout.php" style="color: white;">Your leave ? logout</a>
        </form>
        </section>

 
  
<?php 
$content = ob_get_clean();
require 'layout.php';
