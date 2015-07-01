<?php
session_start();
session_destroy();
$_SESSION['hits2'] =$_SESSION['hits2'] + 1;
echo "This NEW page has been visited {$_SESSION['hits2']} times.";
?>
<hr>
<?php print_r($_SESSION);?>

