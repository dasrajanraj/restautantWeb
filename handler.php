<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['name','email'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('comments')->maxLength(6000);

$pp->sendEmailTo('dasrajanraj@gmail.com'); // ← Your email here

echo $pp->process($_POST);



<<<<<<< HEAD
$pp->sendEmailTo('someone@gmail.com'); // ← Your email here
=======
>>>>>>> 7bca4d3898c962b785b41ab0bed5bd9213321a4e

