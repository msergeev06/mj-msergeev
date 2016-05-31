<?php

namespace MSergeev\Packages\Currency\Tables;

use MSergeev\Core\Lib as CoreLib;
use MSergeev\Core\Entity;

class RatesTable extends CoreLib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_currency_rates';
	}

	public static function getTableTitle ()
	{
		return 'Курсы валют';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\DateField('DATE',array(
				'required' => true,
				'title' => 'Дата курса'
			)),
			new Entity\StringField('CURRENCY_CURRENT',array(
				'required' => true,
				'size' => 3,
				'link' => 'ms_currency_currency.CODE',
				'title' => 'Валюта, которой принадлежит курс'
			)),
			new Entity\StringField('CURRENCY_BASE',array(
				'required' => true,
				'size' => 3,
				'link' => 'ms_currency_currency.CODE',
				'title' => 'Валюта, базовая для курса'
			)),
			new Entity\FloatField('RATE_BUY',array(
				'required' => true,
				'title' => 'Курс покупки'
			)),
			new Entity\FloatField('RATE_CELL',array(
				'required' => true,
				'title' => 'Курс продажи'
			))
		);
	}
}