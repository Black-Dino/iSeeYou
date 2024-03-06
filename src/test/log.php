<?php

use BlackDino\iSeeYou\iSeeYou;

require_once('src/lib/iSeeYou.php');
$app = new iSeeYou();

$data = "<screipt>";
$req = [
    'ip'=>'192',
    'user_agent'=>'ds'
];

$app->PreventXSS($data,$req);
$app->LogingSuspiciousData();