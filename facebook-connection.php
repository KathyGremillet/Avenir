<?php 
require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '659763340851884',
  'app_secret' => 'b8d7d0a2062d9899dfce612956b5b95e',
  'default_graph_version' => 'v2.8',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/Avenir/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>