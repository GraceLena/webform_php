<?php

$user = 'lena';
$pwd = '123';

if ($_POST['btn-log'] === 'login') {
	if ($_POST['user-log'] === $user && $_POST['user-pwd'] === $pwd) {
		$_SESSION['loggedin'] = $_POST['user-log'];
		$auth = 'accepted';
		$authText = 'вы авторизованы';
	} else {
		$auth = 'non-accepted';
		$authText = 'вы не авторизованы';
	}
} else if ($_POST['btn-log'] === 'logout') {
	unset($_SESSION['loggedin']);
}
?>