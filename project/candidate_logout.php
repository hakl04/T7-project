<?php
session_start();
$_SESSION['candidate_id'] = "";
header("Location: index.php");
?>