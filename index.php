<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include("languages_list.php");

// Récupérer l'adresse IP de l'utilisateur
$ip = $_SERVER['REMOTE_ADDR'];

// Appeler l'API ipinfo.io pour récupérer la langue et le pays
$info = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$language = $info->language;
$country = $info->country;

// Définir la langue par défaut comme le français
$defaultLanguage = 'fr';

// Définir la langue du site en conséquence
$language = isset($languagesByCountry[$country]) ? $languagesByCountry[$country] : $defaultLanguage;

// Définir la langue pour le reste de la page
setlocale(LC_ALL, $language);

// Afficher le message de bienvenue dans la langue de l'utilisateur
if ($language == 'nl') {
  echo '<h1>Hallo, hoe gaat het?</h1>'; // Version en néerlandais pour les utilisateurs des Pays-Bas
} else if ($language == 'fr') {
  echo '<h1>Bonjour, comment ça va ?</h1>';
} else if ($language == 'us') {
  echo '<h1>Hello, how are you?</h1>';
} else if ($language == 'jp') {
    echo '<h1>こんにちは元気ですか?</h1>';
} else {
  echo '<h1>Bonjour, comment ça va ?</h1>'; // Par défaut, afficher en français
}


?>

</body>
</html>