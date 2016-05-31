<?php

namespace MSergeev\Packages\Currency\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib as CoreLib;

class CurrencyTable extends CoreLib\DataManager
{
	public static function getTableName()
	{
		return 'ms_currency_currency';
	}

	public static function getTableTitle()
	{
		return 'Список валют';
	}

	public static function getTableLinks ()
	{
		return array(
			'CODE' => array(
				'ms_currency_rates' => array('CURRENCY_CURRENT','CURRENCY_BASE'),
				'ms_currency_pairs' => array('FIRST_CURRENCY','SECOND_CURRENCY')
			)
		);
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID валюты'
			)),
			CoreLib\TableHelper::sortField(),
			new Entity\StringField('CODE',array(
				'required' => true,
				'unique' => true,
				'size' => 3,
				'title' => 'Код валюты'
			)),
			new Entity\IntegerField('CODE_NUM',array(
				'required' => true,
				'title' => 'Числовой код валюты'
			)),
			new Entity\IntegerField('RATING',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Номинал'
			))
		);
	}

	public static function getArrayDefaultValues()
	{
		return array(
			array(
				'SORT' => 100,
				'CODE' => 'RUB',
				'CODE_NUM' => 643,
				'RATING' => 1
			),
			array(
				'SORT' => 200,
				'CODE' => 'USD',
				'CODE_NUM' => 840,
				'RATING' => 1
			),
			array(
				'SORT' => 300,
				'CODE' => 'EUR',
				'CODE_NUM' => 978,
				'RATING' => 1
			),
			array(
				'CODE' => 'AUD',
				'CODE_NUM' => 36,
				'RATING' => 1
			),
			array(
				'CODE' => 'ATS',
				'CODE_NUM' => 40,
				'RATING' => 10
			),
			array(
				'CODE' => 'GBP',
				'CODE_NUM' => 826,
				'RATING' => 1
			),
			array(
				'CODE' => 'BYR',
				'CODE_NUM' => 974,
				'RATING' => 1000
			),
			array(
				'CODE' => 'BEF',
				'CODE_NUM' => 56,
				'RATING' => 100
			),
			array(
				'CODE' => 'GRD',
				'CODE_NUM' => 300,
				'RATING' => 1000
			),
			array(
				'CODE' => 'DKK',
				'CODE_NUM' => 208,
				'RATING' => 10
			),
			array(
				'CODE' => 'IEP',
				'CODE_NUM' => 372,
				'RATING' => 1
			),
			array(
				'CODE' => 'ISK',
				'CODE_NUM' => 352,
				'RATING' => 100
			),
			array(
				'CODE' => 'ESP',
				'CODE_NUM' => 724,
				'RATING' => 100
			),
			array(
				'CODE' => 'ITL',
				'CODE_NUM' => 380,
				'RATING' => 1000
			),
			array(
				'CODE' => 'KZT',
				'CODE_NUM' => 398,
				'RATING' => 100
			),
			array(
				'CODE' => 'CAD',
				'CODE_NUM' => 124,
				'RATING' => 1
			),
			array(
				'CODE' => 'DEM',
				'CODE_NUM' => 276,
				'RATING' => 1
			),
			array(
				'CODE' => 'NLG',
				'CODE_NUM' => 528,
				'RATING' => 1
			),
			array(
				'CODE' => 'NOK',
				'CODE_NUM' => 578,
				'RATING' => 10
			),
			array(
				'CODE' => 'PTE',
				'CODE_NUM' => 620,
				'RATING' => 100
			),
			array(
				'CODE' => 'XDR',
				'CODE_NUM' => 960,
				'RATING' => 1
			),
			array(
				'CODE' => 'SGD',
				'CODE_NUM' => 702,
				'RATING' => 1
			),
			array(
				'CODE' => 'TRL',
				'CODE_NUM' => 792,
				'RATING' => 1000000
			),
			array(
				'CODE' => 'UAH',
				'CODE_NUM' => 980,
				'RATING' => 10
			),
			array(
				'CODE' => 'FIM',
				'CODE_NUM' => 246,
				'RATING' => 10
			),
			array(
				'CODE' => 'FRF',
				'CODE_NUM' => 250,
				'RATING' => 10
			),
			array(
				'CODE' => 'SEK',
				'CODE_NUM' => 752,
				'RATING' => 10
			),
			array(
				'CODE' => 'CHF',
				'CODE_NUM' => 756,
				'RATING' => 1
			),
			array(
				'CODE' => 'JPY',
				'CODE_NUM' => 392,
				'RATING' => 100
			)
		);
	}
}