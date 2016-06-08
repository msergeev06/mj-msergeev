<?php

namespace MSergeev\Packages\Finances\Lib;

use MSergeev\Core\Lib as CoreLib;

class Currency
{
	public static function getDefaultCurrency ()
	{
		return CoreLib\Options::getOptionStr('default_currency');
	}
}