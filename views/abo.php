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
        <!-- Article pour l'abonnement classique -->
        <article class="ContAbo">
          <img class="logoArt" src="../assets/img/gold.png" alt="">
          <h2>Classic</h2>
          <p>€5/month</p>
          <ul>
            <li>25 requests/day</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
        <!-- Article pour l'abonnement premium -->
        <article class="ContAbo">
          <img class="logoArt" src="../assets/img/ruby.png" alt="">
          <h2>Premium</h2>
          <p>€10/month</p>
          <ul>
            <li>50 requests/day</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
        <!-- Article pour l'abonnement King -->
        <article class="ContAbo">
          <img class="logoArt" src="../assets/img/corwn.png" alt="">
          <h2>King</h2>
          <p>€15/month</p>
          <ul>
            <li>Unlimited</li>
          </ul>
          <button class="btnABO">Subscribe</button>
        </article>
      </section>
    </div>

</main>

<?php

include("footer.php");

?>