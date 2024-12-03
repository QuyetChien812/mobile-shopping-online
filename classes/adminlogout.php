<?php
$filepath= realpath(dirname(__FILE__));
require_once($filepath.'/../lib/session.php');
Session::sessionDestroyAll();
header('Location: ../admin/login.php');
exit();
?>
