<?php

require_once('./Task.php');

$t = new Task(
	1,
	'Learn PHP properly',
	'This is a simple task, yet not easy',
	new DateTime(),
	'N'
);

echo $t->toJson() . PHP_EOL;
