<?php
require_once 'conection.php';

if ($con) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query - "SELECT * FROM tb_anggota WHERE username - '$username' AND password '$password'";
}
?>