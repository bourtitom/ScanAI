<?php include("header.php"); ?>
<main>
<section class="loginPage">

<div class="background">
  <div class="shape"></div>
  <div class="shape"></div>
</div>
<form action="../controllers/Controller.php" method="POST">
  <h3 class="UnderTitle">Login Here</h3>
  <input type='hidden' name='todo' value='seConnecter'>

  <label for="email">Email</label>
  <input type="text" name="email" placeholder="Email or Phone" id="email" />

  <label for="password">Password</label>
  <input type="password" name="password" placeholder="Password" id="password" />

  <button class="btnLogin">Log In</button>
  <div class="social">
    <div class="go"><i class="fab fa-google"></i> Google</div>
    <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
  </div>
  <a href="AfficherRegister" style="color: white;">Have an account ? Login</a>
</form>
</section>

</main>
<?php include("footer.php"); ?>
