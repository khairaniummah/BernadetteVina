<?php
require_once '../vendor/restler.php';
use Luracast\Restler\Restler;

$r = new Restler();
$r->setSupportedFormats('JsonFormat', 'XmlFormat');
$r->addAPIClass('BMI');
$r->addAPIClass('sqltoxml');
$r->addAPIClass('sqltoxml2');
$r->addAPIClass('xmltoxml');
$r->addAPIClass('csv2xml2');
$r->handle();


?>