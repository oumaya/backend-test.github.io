<?php
// namespace App;
require __DIR__ . '/vendor/autoload.php';
use App\Robot;

/* must comment this part , for unit test */
$a = new Robot('walking');

var_dump('the first name of this robot is : '.$a->name);

var_dump($a->fly());
var_dump($a->walk());
$a->reset();
var_dump('the name after reset is : '.$a->name);
