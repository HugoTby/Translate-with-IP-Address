
# Translate a website from the IP address

This code is used to determine the user's language based on their IP address and to display a welcome message in the corresponding language.

The first part of the HTML code is a document type declaration (DOCTYPE) and an HTML tag with a language defined as English. The `<head>` tag contains several `<meta>` tags to specify character encoding, compatibility with Internet Explorer and scaling for mobile devices.

Next, the page includes a PHP file named ``languages_list.php``, which probably contains a list of languages with their corresponding country codes.

The PHP code starts by retrieving the user's IP address from the global variable ``$_SERVER['REMOTE_ADDR']``. Then it calls the `ipinfo.io` API to retrieve information about the user, such as their language and country, from their IP address. This information is stored in the $info variable.

The default language of the site is set to French in the $defaultLanguage variable. Then, the `$language` variable is defined according to the user's country using the list of languages in the `languages_list.php` file. If the language is not defined for that country, the default language is used.

The PHP function `setlocale()` is then called to set the language for the rest of the page according to the $language variable.

Finally, a welcome message is displayed in the user's language according to the value of `$language`. If the language is not recognised, the default message in French is displayed.
[!] **Note that for this code to work correctly, the ipinfo.io API must be available and the list of languages in the ``languages_list.php`` file must be up-to-date.**

---
## In case of error


If there is a translation error, or if the translation language is not available, the page displayed will be the default page. In this example the default text is in French.
```php
} else {
  echo '<h1>Bonjour, comment ça va ?</h1>';
```

---
## Including the `languages_list.php` file

For this project, I use _include_ but you can also use the following instructions :
```php
require("languages_list.php");

require_once("languages_list.php");

include("languages_list.php");

include_once("languages_list.php");
```

Use `require` to include and run a file, and generate a fatal error if the file cannot be included.

Use `require_once` to include and run a file only once, which can avoid multiple re-inclusions and the potential errors that come with them.

Use `include` to include and run a file, but generate a warning instead of a fatal error if the file cannot be included.

Use `include_once` to include and run a file once, but generate a warning instead of a fatal error if the file cannot be included.

_It is important to choose the right type of instruction depending on the need for code and error handling in your application._

The file includes the international code and the name of the country. This array allows us to make the link between the IP address and the translation language. :
```php
$languagesByCountry = array(

    'JP' => 'jp', // 日本 🇯🇵
    'FR' => 'fr', // France 🇫🇷
    'NL' => 'nl', // Netherlands 🇳🇱
    'US' => 'us', // United States of America 🇺🇸
    [...]
);
```

---
## Get the geographical information from the IP address


We use the `file_get_contents` function to get the geographical information from the IP address ( with -> ipinfo.io ) :
```php
$ip = $_SERVER['REMOTE_ADDR'];
$info = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$language = $info->language;
$country = $info->country;
```

---
## Set the default language and translation language


Here we define the default language and we define the language of the site if the origin of the IP address is well located.

```php
$defaultLanguage = 'fr';

$language = isset($languagesByCountry[$country]) ? $languagesByCountry[$country] : $defaultLanguage;    

```



## Author

- [Hugo T](https://www.github.com/HugoTby)

