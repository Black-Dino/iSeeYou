<?php
use BlackDino\iSeeYou\iSeeYou;

require_once('src/lib/iSeeYou.php');
$app = new iSeeYou();

// dangrous data
$data = '<script>alert(origin)<script>';

// safe data
$data = 'hello-world';

echo $app->PreventXSS($data);
