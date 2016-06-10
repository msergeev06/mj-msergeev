<?php

namespace MSergeev\Packages\Finances\Lib;

use MSergeev\Core\Lib as CoreLib;

class Currency
{
	public static function getDefaultCurrency ()
	{
		return CoreLib\Options::getOptionStr('finances_default_currency');
	}

	public static function getCurrencySign ($currency)
	{
		//TODO: Сделать нормально все валюты
		switch ($currency)
		{
			case 'RUB':
				return 'Р';
			case 'USD':
				return '$';
			case 'EUR':
				return "&euro";
		}
	}
}