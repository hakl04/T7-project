<?php
session_start();
$_SESSION['company_id'] = "";
header("Location: index.php");
?>