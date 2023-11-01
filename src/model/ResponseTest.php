<?php

require_once("./Response.php");

$r = new Response();
$r->setHttpStatusCode(200);
$r->setSuccess(true);
$r->send();
