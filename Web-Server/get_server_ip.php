<?php
$serverIP = $_SERVER['SERVER_ADDR'];
echo json_encode(array('ip' => $serverIP));
?>
