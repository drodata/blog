<?php
session_start();
$_SESSION['hits'] =$_SESSION['hits'] + 1;
echo "This page has been visited {$_SESSION['hits']} times.";
/*
*/
?>
<hr>
<?php print_r($_SESSION);?>
<hr>
<?php echo session_id();?>
<hr>
go to <a href="session-2.php">Session 2</a>
