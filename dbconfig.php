<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('crimereporting-14bd1-firebase-adminsdk-y6skm-e1a999067a.json')
    ->withDatabaseUri('https://crimereporting-14bd1-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();

?>

