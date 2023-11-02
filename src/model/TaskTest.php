<?php

require_once('./Task.php');

$t = new Task(
	1,
	'Learn PHP properly',
	'This is a simple task, yet not easy',
	'12-12-27 17:23:43',
	'N'
);

echo $t->toJson() . PHP_EOL;
