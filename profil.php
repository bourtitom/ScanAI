<!DOCTYPE html>
<html lang="en">
  <head>
  
<link href="
https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5.0.16/dark.css
" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ScanAI</title>
  </head>
  <body>
     <!-- Barre de navigation -->
     <nav class="navLanding">
      <a href="index.php"><img src="logoScanAI.png" class="logo" /></a>
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
        <!-- Formulaire d'inscription -->
        <form style="height: 650px; width: 50%;">
        <h3 style="color: #93cf13; text-align: center; margin-bottom: 30px;">Mon Profil</h3>
    
    <!-- Section de modification du mot de passe -->
    <div class="profile-item">
        <label for="password" style="color: #ffffff;">Nouveau mot de passe</label>
        <input type="password" id="password" placeholder="Entrer le nouveau mot de passe" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #93cf13; background-color: #090e16; color: white;">
    </div>
    
    <!-- Affichage des tokens et recharge -->
    <div class="profile-item" style="margin-top: 20px;">
        <label style="color: #ffffff;">Tokens disponibles: <span id="token-count">50</span></label>
        <button type="button" onclick="rechargeCredits()" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #93cf13; background-color: #93cf13; color: white; cursor: pointer;">Recharger les crédits</button>
    </div>
    
    <!-- Bouton de mise à jour du profil -->
    <div class="profile-item" style="margin-top: 20px;">
        <button type="submit" style="width: 100%; padding: 15px; border-radius: 5px; border: none; background-color: #93cf13; color: white; cursor: pointer;">Mettre à jour le profil</button>
    </div>
</form>
        </form>
   

  </body>
  
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js
"></script>
<SCRIPT>

function rechargeCredits() {
    Swal.fire({
        title: 'Méthode de paiement',
        html: `
            <button id="payment-card" class="swal2-confirm swal2-styled" style="display: block; margin: 10px; border-left: none; border-right: none;"> <i class="fa-solid fa-credit-card"></i> Paiement par carte bancaire</button>
            <button id="payment-crypto" class="swal2-deny swal2-styled" style="display: block; margin: 10px; border-left: none; border-right: none;"><i class="fa-brands fa-bitcoin"></i> Paiement par cryptomonnaies</button>
        `,
        showConfirmButton: false,
        didOpen: () => {
            document.getElementById('payment-card').addEventListener('click', () => {
                Swal.fire('Redirection...', 'Vous allez être redirigé vers le paiement par carte bancaire.', 'success');
                // Logique de redirection pour le paiement par carte
            });
            document.getElementById('payment-crypto').addEventListener('click', () => {
                Swal.fire('Redirection...', 'Vous allez être redirigé vers le paiement par cryptomonnaies.', 'success');
                // Logique de redirection pour le paiement par cryptomonnaies
            });
        }
    });
}


  </script>
<script src="https://kit.fontawesome.com/fd7b39a087.js" crossorigin="anonymous"></script>

</html>
