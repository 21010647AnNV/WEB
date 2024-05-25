<?php
include('./archive/config.php');
if (!$connect)
    exit(0);
$armymem = $conn->query("SELECT COUNT(*) FROM `armymem`; ")->fetch_assoc();
var_dump($armymem);
?>
