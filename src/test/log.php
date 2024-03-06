<?php

use BlackDino\iSeeYou\iSeeYou;

require_once('src/lib/iSeeYou.php');
$app = new iSeeYou();

$data = "<screipt>";

$app->PreventXSS($data);
$app->LogingSuspiciousData();