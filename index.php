<?php
require_once("Twig/lib/Twig/Autoloader.php" );

function array_from_json_file($basename){
  return json_decode(file_get_contents("$basename"), true);
}

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem( 'templates/');
$twig = new Twig_Environment($loader, array(
    'debug' => true
));

$twig->addExtension(new Twig_Extension_Debug());

echo $twig->render('index.html.twig', array_from_json_file('config.json'));
?>