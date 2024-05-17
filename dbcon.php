<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;


$factory = (new Factory)
    ->withServiceAccount('put your own')
    ->withDatabaseUri('put your own');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>