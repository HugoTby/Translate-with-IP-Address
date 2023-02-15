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
    
// [FR] Il est important de noter que dans ce code vous pouvez utiliser des fonction, ou tout autres code permettent une traduction et un affichage du site. Dans cette exemple nous avons simulé un message de bienvenue entre des balises HTML <h1>.
// [EN] It is important to note that in this code you can use functions, or any other code that allows translation and display of the site. In this example we have simulated a welcome message between HTML <h1> tags.

    
// [FR] Ici on inclus le fichier languages_list.php pour récupérer la langue a partir de l'adresse IP.
// [EN] Here we include the languages_list.php file to get the language from the IP address.
include("languages_list.php");

// [FR] Récupérer l'adresse IP de l'utilisateur
// [EN] Retrieve the user's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// [FR] Appeler l'API ipinfo.io pour récupérer la langue et le pays
// [EN] Call the ipinfo.io API to get the language and country
$info = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$language = $info->language;
$country = $info->country;

// [FR] Définir la langue par défaut comme le français
// [EN] Set the default language as French
$defaultLanguage = 'fr';

// [FR] Définir la langue du site en conséquence
// [EN] Set the language of the site accordingly
$language = isset($languagesByCountry[$country]) ? $languagesByCountry[$country] : $defaultLanguage;

// [FR] Définir la langue pour le reste de la page
// [EN] Set the language for the rest of the page
setlocale(LC_ALL, $language);

// [FR] Afficher le message de bienvenue (exemple) dans la langue de l'utilisateur définie dans languages_list.php
// [EN] Display the welcome message (example) in the user's language defined in languages_list.php
if ($language == 'nl') {
  echo '<h1>Hallo, hoe gaat het?</h1>'; /
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
