<?php
include('./view/header.php');
include('./view/navbar.php');
?>

<h1>count <?= $count ?></h1>
<h2>regid <?= $regid ?></h2>
<h2>regid <?= $action ?></h2>
<p><?php print_r($reg) ?></p>


<?php
include('./view/footer.php');
?>