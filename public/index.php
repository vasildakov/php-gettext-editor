<?php

use Gettext\Loader\PoLoader;
use Gettext\Generator\MoGenerator;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';


//import from a .po file:
$loader = new PoLoader();
$translations = $loader->loadFile('./data/en_UK.pot');

//edit some translations:
$translation = $translations->find(null, 'Home');

if ($translation) {
    $translation->translate('Начало');
}

//export to a .mo file:
$generator = new \Gettext\Generator\PoGenerator();
$generator->generateFile($translations, './data/bg_BG.po');

dump([
    'original' => $translation->getOriginal(),
    'translation' => $translation->getTranslation()
]);