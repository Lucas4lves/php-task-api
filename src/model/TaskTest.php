<?php

require_once('./Task.php');

$t = new Task(
	1,
	'Learn PHP properly',
	'This is a simple task, yet not easy',
	"01/30/2022",
);

echo $t->toJson() . PHP_EOL;
