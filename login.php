<?php
ob_start();
?>
    <section class="loginPage">

      <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
      </div>
      <form action="core/processors/processLogin.php" method="POST">
        <h3 class="UnderTitle">Login Here</h3>

        <label for="username">Email</label>
        <input type="text" name="email" placeholder="Email or Phone" id="username" />

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" />

        <button class="btnLogin">Log In</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i> Google</div>
          <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
        <a href="register.php" style="color: white;">Have an account ? Login</a>
      </form>
    </section>

    <?php 
$content = ob_get_clean();
require 'layout.php';
