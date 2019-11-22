<?php

require __DIR__ . '/vendor/System/Application.php';
require __DIR__ . '/vendor/System/File.php';

use App\Controllers\Users\Users;
use System\File;
use System\Application;
use System\Test;


$file = new File(__DIR__);
////echo $file->toVendor('System/test');
$app = Application::getInstance($file);
//
//
$app->run();

//

//new Users;
