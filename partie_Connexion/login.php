<?php
require_once 'vendor/autoload.php';
require_once '.env';
session_start();

$client = new Google_Client();
$client->setClientId(clientId);
$client->setClientSecret(clientSecret);
$client->setRedirectUri(RedictUri);
$client->addScope("email");
$client->addScope("profile");

$login_url = $client->createAuthUrl();
header('Location: ' . filter_var($login_url, FILTER_SANITIZE_URL));
?>