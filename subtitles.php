<?php
	$url = $_GET['url'];
	$data = file_get_contents($url);
	header('Content-Type: text/plain');
	echo $data;
	die();
?>