<?php

require_once('./Task.php');

$t = new Task(
	1,
	'Learn PHP properly',
	'This is a simple task, yet not easy',
	"02/12/2022 12:55:21",
	'N'
);

echo $t->toJson() . PHP_EOL;
