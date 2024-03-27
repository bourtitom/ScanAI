<?php
ob_start();
?>
<div class="container404">
<h1 class="error">Error 404</h1>
</div>

<?php 
$content = ob_get_clean();
require 'layout.php';