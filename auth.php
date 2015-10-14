<?php

require_once 'loader.php';
session_start();

class Auth {
	
	public function __construct() {
		
	}
	
	public static function accessLevel($access) {
		switch($access) {
			case 'all':
				break;
			case 'user':
				if (!self::isLogged()) {
					session_unset();
					self::redirect('login.php');
				}
				break;
			case 'admin':
				if (!self::hasPermission('admin')) {
					session_unset();
					self::redirect('login.php');
				}
				break;
			default:
				break;
		}
	}
	
	public static function isLogged() {
		if (isset($_SESSION['logged']) && $_SESSION['logged']) {
			return true;
		} else {
			return false;
		}
	}
	
	public function hasPermission($access) {
		if (!self::isLogged()) {
			return false;
		} 
		
		if (isset($_SESSION['perm']) && $_SESSION['perm'] == $access) {
			return true;
		} else{
			return false;
		}
	}
	
	public static function redirect($url) {
		if (function_exists(http_redirect)) {
			http_redirect($url);
		} else {
			header('Location: login.php');
			exit;
		} 
	}
}