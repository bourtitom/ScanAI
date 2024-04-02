<?php include("header.php"); ?>
<main>
    <!-- Conteneur d'abonnement -->
    <div class="containerAbo">
      <!-- Titre de la section -->
      <h1 id="AboTitle">
        Subscription
      </h1>
      <!-- Section d'abonnement -->
      <section class="SectionAbo">

      <?php 
 
      foreach($contenu as $abo){
      ?>
        <!-- Article pour l'abonnement classique -->
        <article class="ContAbo">
          <img class="logoArt" src="../assets/img/<?= $abo->getImage() ?>" alt="">
          <h2><?= $abo->getNom() ?></h2>
          <p><?= $abo->getPrix() ?>/month</p>
          <ul>
            <li><?= $abo->getRequest() ?> requests/day</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
        <?php
        }
      ?>
      </section>
    </div>

</main>

<?php

include("footer.php");

?>