
<?php

include("header.php");

?>
<main>
    <?php
    if (isset($recherche)) {
        echo $recherche;
    }
    //injection en PHP du contenu -->

    if (isset($contenu)) {
        echo $contenu;
    }
    ?>
</main>


<?php

include("footer.php");

?>