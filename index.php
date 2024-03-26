<?php
ob_start();
?>
    <div class="containerTitle">
      <div class="containerAll">
        <div id="particles-js"></div>
        <h1 class="mainTitle" id="mainTitle">
          Instant Document Translation with <span>ScanAI</span><br />
         Your Content Transformed in Seconds
        </h1>
        <button class="shadow__btn"><a href="login.php" style="color: white;">Try it now</a></button>
      </div>
    </div>

    <section class="section1">
      <div class="parent" id="grid">
        <div class="div1"><h2 class="gridTitle">Facile à utiliser</h2><br>ScanAI offre une interface conviviale qui permet de traduire vos documents rapidement et simplement.</div>
        <div class="div2"><h2 class="gridTitle">Traduction instantanée</h2><br>Avec ScanAI, vous pouvez obtenir des traductions instantanées de vos documents dès qu'ils sont importés dans notre système.</div>
        <div class="div3"><h2 class="gridTitle">Précision garantie</h2><br>Notre technologie de pointe garantit des traductions précises et fiables pour tous vos besoins linguistiques.</div>
        <div class="div4"><h2 class="gridTitle">Sécurité des données</h2><br>Vos documents sont sécurisés avec nous. Nous prenons la confidentialité de vos données très au sérieux.</div>
        <div class="div5"><h2 class="gridTitle">Support multi-langue</h2><br>ScanAI prend en charge un large éventail de langues, ce qui vous permet de traduire des documents dans différentes langues.</div>
        <div class="div6"><h2 class="gridTitle">Accessible partout</h2><br>Que vous soyez au bureau, à la maison ou en déplacement, ScanAI est accessible depuis n'importe quel appareil connecté à Internet.</div>
        <div class="mouse-follower" id="mouseFollower"></div>
      </div>
    </section>

    <section class="section2">
      <div class="containerImg">
         <img src="ex1.png" class="beforeAfter">
         <img src="arrow-right.svg" class="arrow" style="color: #93cf13;">
         <img src="ex2.png" class="beforeAfter">
      </div>
      <button class="shadow__btn"><a href="login.php" style="color: white;">Try it now</a></button>

    </section>

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
<?php 
$content = ob_get_clean();
require 'layout.php';



