<?php

use BlackDino\iSeeYou\iSeeYou;

require_once('src/lib/iSeeYou.php');
$app = new iSeeYou();


// dangrous data
$data = '.php.jpg';

// safe data
$data = 'meow.png';

$app->PreventRCE($data);