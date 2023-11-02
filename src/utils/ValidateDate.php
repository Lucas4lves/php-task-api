<?php

class DateValidationException extends Exception {}

function validateDateFromString(string $date, string $mask) : bool
{
	try{
		$dateFromString = new DateTime($date);
		//echo "DEBUG\n";
		echo $dateFromString->format($mask) . PHP_EOL;
		//echo "DEBUG\n";
		if ($dateFromString->format($mask) === $date){
			return true;
		}
		return false;
	}catch(DateValidationException $dex)
	{
		echo "ERROR: " . $dex->getMessage() . PHP_EOL;
		return false;
	}

}

function shouldReturnTrue()
{
	if(validateDateFromString("03/28/1995 12:12:12", 'm/d/Y h:i:s')){
		echo "TRUE \n";
		return 1;
	}

	echo "FALSE\n";
	return 0;
}


//echo shouldReturnTrue();


