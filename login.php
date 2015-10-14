<?php
require_once 'auth.php';
require_once 'template.php';

// set access level
$access = 'all';
Auth::accessLevel($access);

Template::pageHeader('Login');
?>

<div class="row">
	<h2>Login</h2>
</div>
<?php
Template::pageFooter();