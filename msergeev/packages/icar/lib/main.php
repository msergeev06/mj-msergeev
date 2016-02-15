<?php

namespace MSergeev\Packages\Icar\Lib;

class Main
{
	public static function moneyFormat ($value=0,$input=false)
	{
		if ($input)
			return number_format($value,2,'.','');
		else
			return number_format($value,2,',',' ');
	}

	public static function mileageFormat ($value,$input=false)
	{
		if ($input)
			return number_format($value,1,'.','');
		else
			return number_format($value,1,',',' ');
	}
}