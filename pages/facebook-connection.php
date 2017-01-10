<?php 
include('../config/fb-settings.php');

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/Avenir/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>