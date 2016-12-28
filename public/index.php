<?php
require __DIR__.'/../vendor/autoload.php';

use Core\kernel;

require __DIR__.'/../src/config.php';

header(ENCODING);
error_reporting(E_ALL);
date_default_timezone_set(TIMEZONE);

new Core\kernel(); //Launch!




