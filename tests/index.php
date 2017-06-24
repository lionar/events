<?php

use events\dispatcher;

require __DIR__ . '/../vendor/autoload.php';

$event = new dispatcher;

$event->listen ( 'hello', function ( $name )
{
	echo "Hello, $name";
} );

$event->fire ( 'hello', [ 'name' => 'Aron' ] );