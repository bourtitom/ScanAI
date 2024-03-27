<?php 



?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
<link href="
https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5.0.16/dark.css
" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <style>

#paymentInfoContainer {
    background-color: #121212; /* Couleur de fond sombre pour le contraste */
    color: #ffffff; /* Texte blanc pour le contraste */
    border: 1px solid #25b09b; /* Bordure légère */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre subtile pour un effet "flottant" */
    padding: 20px;
    margin-top: 20px;
    border-radius: 10px;
    transition: all 0.5s ease; /* Transition douce pour l'affichage */
    position: relative; /* Pour positionner absolument le timer */
}

#paymentInfoContainer h3 {
    color: #25b09b; /* Couleur accrocheuse pour les titres */
    margin-bottom: 20px;
    text-align: center; /* Centre le titre pour attirer l'attention */
    font-size: 1.5rem;
}

#paymentInfoContainer p {
    margin: 10px 0;
    font-size: 1.1rem; /* Texte légèrement plus grand pour la lisibilité */
    line-height: 1.6;
}

#timer {
    position: absolute; /* Positionne le timer */
    top: 20px;
    right: 20px;
    background-color: #25b09b; /* Arrière-plan accrocheur pour le timer */
    color: #000000; /* Texte sombre pour le contraste */
    padding: 10px 20px;
    border-radius: 50px; /* Bords arrondis pour un look moderne */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Ombre pour le relief */
    font-weight: bold;
    font-size: 1rem;
}

.loader {
    border-color: #25b09b transparent #25b09b transparent; /* Couleurs de l'animation */
    animation: l15 1.5s infinite linear;
}

.payment-status {
    margin-top: 20px;
    text-align: center;
}

#statusText {
    font-size: 1.2rem;
    color: #ffffff; /* Blanc pour contraster avec le fond sombre */
}

#statusIcon {
    font-size: 2rem; /* Taille des icônes */
    margin-top: 10px;
}

/* Exemples de styles pour les icônes selon le statut */
.status-waiting {
    color: #ffc107; /* Jaune pour statut en attente */
}

.status-success {
    color: #28a745; /* Vert pour statut réussi */
}

.status-failed {
    color: #dc3545; /* Rouge pour statut échoué */
}


@keyframes l15 { 
    100% { transform: rotate(1turn); }
}
</style>
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
        <form  action="#" style="height: 650px; width: 50%;" disabled>
        <h3 style="color: #93cf13; text-align: center; margin-bottom: 30px;">Rechargement de vos tokens</h3>
    

           <div id="paymentForm">
            <div class="profile-item">
                <label for="amount">Montant à payer :</label>
                <input type="text" id="amount" name="amount" placeholder="Montant en USD" required>
            </div>
            <br>
            <div class="profile-item">
                <button  onclick="submitPaymentForm(event)" id="submitPayment">Génerer ma facture</button>
            </div>
        </div>

        <div id="paymentInfoContainer" style="display:none; color: white; background-color: #1d2734; padding: 20px; margin-top: 20px; border-radius: 10px;">
    <h3>Informations de Paiement</h3>
    <p id="orderDescription"></p>
    <p>Adresse de paiement : <span id="payAddresse"></span></p>
    <p>Montant : <span id="payAmount"></span> <span id="payCurrency"></span></p>
     <span id="timer"></span>

    <div id="paymentStatus" class="payment-status">
    <p id="statusText">Statut du rechargement : <span id="statusValue">En attente...</span></p>
    <div id="statusIcon"></div>
</div>


    
        </form>
   

  </body>
  <script>
function updatePaymentStatus(status) {
    const statusValue = document.getElementById("statusValue");
    const statusIcon = document.getElementById("statusIcon");
    statusIcon.className = ""; // Réinitialiser les classes

    if (status === "waiting") {
        statusValue.textContent = "En attente de paiement";
        statusIcon.classList.add("fas", "fa-hourglass-half", "status-waiting");
    } else if (status === "success") {
        statusValue.textContent = "Paiement réussi";
        statusIcon.classList.add("fas", "fa-check-circle", "status-success");
    } else if (status === "failed") {
        statusValue.textContent = "Paiement échoué";
        statusIcon.classList.add("fas", "fa-times-circle", "status-failed");
    }
}

function updatePaymentTimer(expirationDate) {
    const countDownDate = new Date(expirationDate).getTime();
    const now = new Date().getTime();
    const distance = countDownDate - now;

    // Calcul du temps restant
  
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Affichage du résultat dans l'élément avec id="timer"
    document.getElementById("timer").innerText =  minutes + "m " + seconds + "s ";

    // Gestion de l'expiration
    if (distance < 0) {
        document.getElementById("timer").innerText = "EXPIRÉ";
        return false; // Arrête la mise à jour si expiré
    }

    return true; // Continue la mise à jour si pas encore expiré
}

let timerInterval;

function startTimer(expirationDate) {
    // Arrête l'intervalle précédent si existe
    if (timerInterval) clearInterval(timerInterval);

    // Appel initial pour éviter le délai de 1 seconde avant la première mise à jour
    if (!updatePaymentTimer(expirationDate)) return;

    // Crée un nouvel intervalle
    timerInterval = setInterval(function() {
        if (!updatePaymentTimer(expirationDate)) {
            clearInterval(timerInterval);
        }
    }, 1000);
}


function submitPaymentForm(e) {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    var url = 'core/processors/createPaymentCrypto.php';

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            if(data.success && data.paymentInfo) {
                document.getElementById("payAddresse").innerText = data.paymentInfo.payAddress;
                document.getElementById("payAmount").innerText = data.paymentInfo.payAmount;
                document.getElementById("payCurrency").innerText = data.paymentInfo.payCurrency;
                startTimer(data.paymentInfo.expirationDate);
        
                updatePaymentStatus(data.paymentInfo.payment_status);

                document.getElementById("paymentInfoContainer").style.display = "block";
            } else {
                console.log(data);
                alert("Erreur lors de la création du paiement. Veuillez réessayer.");
            }
        } else if (xhr.readyState === 4) {
            console.error('Error:', xhr.responseText);
            alert("Erreur lors de la communication avec le serveur. Veuillez réessayer.");
        }
    };

    var data = JSON.stringify({
        "amount": document.getElementById("amount").value
    });

    xhr.send(data);
}

function checkForCurrentPayment(userId) {
    var xhr = new XMLHttpRequest();
    var url = "core/processors/getLastWaitingPayment.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            if(data.success && data.payment) {
                displayPaymentInfo(data.payment);
            } else {
                console.log(data.message || 'Erreur inattendue lors de la récupération du paiement en cours.');
            }
        }
    };

    var data = JSON.stringify({
        "userId": userId
    });
    xhr.send(data);
}

function displayPaymentInfo(paymentInfo) {
    // Affichage de l'adresse de paiement
    document.getElementById("payAddresse").innerText = paymentInfo.payAddress;
    
    // Affichage du montant du paiement
    document.getElementById("payAmount").innerText = paymentInfo.payAmount;
    
    // Affichage de la devise du paiement
    document.getElementById("payCurrency").innerText = paymentInfo.payCurrency;
    
    // Lancement du timer basé sur la date d'expiration
    startTimer(paymentInfo.expirationDate);
    
    // Mise à jour du statut du paiement
    updatePaymentStatus(paymentInfo.paymentStatus);

    // Affichage du conteneur d'informations de paiement
    document.getElementById("paymentInfoContainer").style.display = "block";
}


// Exemple d'appel
document.addEventListener("DOMContentLoaded", function() {
    const userId = "1"; // Remplacez ceci par l'ID de l'utilisateur actuel
    checkForCurrentPayment(userId);
});



    </script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js
"></script>

<script src="https://kit.fontawesome.com/fd7b39a087.js" crossorigin="anonymous"></script>

</html>
