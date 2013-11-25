<?php
require_once '../../vendor/restler.php';
use Luracast\Restler\Restler;

$r = new Restler();
$r->addAPIClass('mencari');
$r->addAPIClass('Csv2xml2');
$r->handle();
?>