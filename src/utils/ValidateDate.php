<?php

function validateDateFromString(string $date, string $mask) : bool
{
	$dateFromString = new DateTime($date);
	return assert($dateFromString->format($mask) === $date);
}

