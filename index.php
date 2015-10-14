<?php
require_once 'auth.php';
require_once 'template.php';

// set access level
$access = 'user';
Auth::accessLevel($access);

Template::pageHeader('Home');
?>

<div class="row">
	<h2>Home</h2>
</div>
<?php
Template::pageFooter();