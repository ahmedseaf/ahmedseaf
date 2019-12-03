<?php

require __DIR__ . '/vendor/autoload.php';



use System\File;
use System\Application;


$file = new File(__DIR__);
////echo $file->toVendor('System/test');
$app = Application::getInstance($file);
//
//
$app->run();

//

//new Users;
