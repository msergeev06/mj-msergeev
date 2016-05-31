<?php

namespace MSergeev\Packages\Currency\Tables;

use MSergeev\Core\Lib as CoreLib;
use MSergeev\Core\Entity;

class PairsTable extends CoreLib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_currency_pairs';
	}

	public static function getTableTitle()
	{
		return 'Валютные пары';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\StringField('FIRST_CURRENCY',array(
				'required' => true,
				'size' => 3,
				'link' => 'ms_currency_currency.CODE',
				'title' => 'Первая валюта в паре'
			)),
			new Entity\StringField('SECOND_CURRENCY',array(
				'required' => true,
				'size' => 3,
				'link' => 'ms_currency_currency.CODE',
				'title' => 'Вторая валюта в паре'
			))
		);
	}

	public static function getArrayDefaultValues()
	{
		return array(
			array(
				'FIRST_CURRENCY' => 'AUD',
				'SECOND_CURRENCY' => 'CAD'
			),
			array(
				'FIRST_CURRENCY' => 'AUD',
				'SECOND_CURRENCY' => 'CHF'
			),
			array(
				'FIRST_CURRENCY' => 'AUD',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'AUD',
				'SECOND_CURRENCY' => 'NZD'
			),
			array(
				'FIRST_CURRENCY' => 'AUD',
				'SECOND_CURRENCY' => 'USD'
			),
			array(
				'FIRST_CURRENCY' => 'CAD',
				'SECOND_CURRENCY' => 'CHF'
			),
			array(
				'FIRST_CURRENCY' => 'CAD',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'CHF',
				'SECOND_CURRENCY' => 'BGN'
			),
			array(
				'FIRST_CURRENCY' => 'CHF',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'CHF',
				'SECOND_CURRENCY' => 'RON'
			),
			array(
				'FIRST_CURRENCY' => 'CHF',
				'SECOND_CURRENCY' => 'TRY'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'AUD'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'CAD'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'CHF'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'CZK'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'DKK'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'GBP'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'HKD'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'HUF'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'ILS'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'MXN'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'NOK'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'NZD'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'PLN'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'RON'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'RUB'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'SEK'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'SGD'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'TRY'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'USD'
			),
			array(
				'FIRST_CURRENCY' => 'EUR',
				'SECOND_CURRENCY' => 'ZAR'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'AUD'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'BGN'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'CAD'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'CHF'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'CZK'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'DKK'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'HKD'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'HUF'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'NOK'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'NZD'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'PLN'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'RON'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'SEK'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'TRY'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'USD'
			),
			array(
				'FIRST_CURRENCY' => 'GBP',
				'SECOND_CURRENCY' => 'ZAR'
			),
			array(
				'FIRST_CURRENCY' => 'HKD',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'MXN',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'NZD',
				'SECOND_CURRENCY' => 'CAD'
			),
			array(
				'FIRST_CURRENCY' => 'NZD',
				'SECOND_CURRENCY' => 'CHF'
			),
			array(
				'FIRST_CURRENCY' => 'NZD',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'NZD',
				'SECOND_CURRENCY' => 'USD'
			),
			array(
				'FIRST_CURRENCY' => 'SGD',
				'SECOND_CURRENCY' => 'HKD'
			),
			array(
				'FIRST_CURRENCY' => 'SGD',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'TRY',
				'SECOND_CURRENCY' => 'BGN'
			),
			array(
				'FIRST_CURRENCY' => 'TRY',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'TRY',
				'SECOND_CURRENCY' => 'RON'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'BGN'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'CAD'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'CHF'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'CZK'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'DKK'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'HKD'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'HUF'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'ILS'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'JPY'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'MXN'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'NOK'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'PLN'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'RON'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'RUB'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'SEK'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'SGD'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'TRY'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'ZAR'
			),
			array(
				'FIRST_CURRENCY' => 'USD',
				'SECOND_CURRENCY' => 'RON'
			)
		);
	}
}