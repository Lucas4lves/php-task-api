<?php

require_once('./Task.php');

$t = new Task(
	1,
	'Learn PHP properly',
	'This is a simple task, yet not easy',
	'11/10/2023 12:00',
	'N'
);

echo $t->toJson() . PHP_EOL;
