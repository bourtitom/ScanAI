<?php
ob_start();
?>


<div class="containerUpload">
<div class="dropdown">
  <button class="dropdown-btn" aria-haspopup="menu">
    <span>Langue</span>
    <span class="arrow"></span>
  </button>
  <ul class="dropdown-content" role="menu">
    <li style="--delay: 1;"><a href="#">Anglais</a></li>
    <li style="--delay: 2;"><a href="#">Français</a></li>
    <li style="--delay: 3;"><a href="#">Coréen</a></li>
    <li style="--delay: 4;"><a href="#">Espagnole</a></li>
  </ul>
</div>
<div class="input-div">
  <input class="inputtt" name="file" type="file">
<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon"><polyline points="16 16 12 12 8 16"></polyline><line y2="21" x2="12" y1="12" x1="12"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
</div>
</div>



<?php 
$content = ob_get_clean();
require 'layout.php';