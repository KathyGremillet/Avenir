<?php 

session_start();

include('../config/fb-settings.php');

use Facebook\FacebookRequest;

$helper = $fb->getRedirectLoginHelper();

$_SESSION['FBRLH_state']=$_GET['state'];

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
/*echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());*/

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
/*echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);*/

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('659763340851884'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.

$response = $fb->get('/me?fields=email,first_name,last_name', $_SESSION['fb_access_token']);

$user = $response->getGraphUser();
/*echo 'ID: ' . $user['id'] . ' ';*/
$email = $user['email'];
$prenom = $user['first_name'];
$nom = $user['last_name'];


//On vérifie si l'utilisateur est déjà inscrit
include ('../settings.php');

$requete_verif = $bdd->prepare('SELECT * FROM user WHERE mail = :mail');
// on exécute la requête
$requete_verif->execute(array(
  'mail' => $email
  ));

// s'il y a un résultat (ou plus) 
if($requete_verif->rowCount() > 0){

  $donnees=$requete_verif->fetch();

  // on crée la session de l'utilisateur
  $_SESSION['id'] = $donnees['id'];
  $_SESSION['mail'] = $email;
  $_SESSION['prenom'] = $donnees['prenom'];
  $_SESSION['nom'] = $donnees['nom'];

  // on redirige 
  header('Location: ../index.php');
  exit;
// fin du test
} else{
  // on enregistre dans la BDD
  $requete = $bdd->prepare('INSERT INTO user (nom, prenom, mail, password, age, adresse, adresse2, cp, ville) VALUES (:nom, :prenom, :mail, "", "0", "", "", "0", "")');

  $requete->execute(array(
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':mail' => $email
    ));

  // on crée la session de l'utilisateur
  $_SESSION['id'] = $bdd->lastInsertId();
  $_SESSION['mail'] = $email;
  $_SESSION['prenom'] = $prenom;
  $_SESSION['nom'] = $nom;

  // on le redirige vers la page d'accueil
  header('Location: ../index.php');
}

?>