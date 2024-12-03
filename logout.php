<?php
require_once("lib/session.php");
Session::sessionDestroyAll();
header('location: index.php');
?>