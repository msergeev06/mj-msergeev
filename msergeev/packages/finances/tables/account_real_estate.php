<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountRealEstateTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_account_real_estate';
	}

	public static function getTableTitle ()
	{
		return 'Счет, связанный с недвижимостью';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\IntegerField('ACCOUNT_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_accounts.ID',
				'title' => 'ID счета'
			)),
			new Entity\IntegerField('ESTATE_TYPE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Тип имущества (1 - дом, 2 - квартира)'
			)),
			new Entity\FloatField('TOTAL_AREA',array(
				'title' => 'Площадь общая, кв.м.'
			)),
			new Entity\FloatField('AREA_USEFUL',array(
				'title' => 'Полезная площадь, кв.м.'
			)),
			new Entity\FloatField('LAND_AREA',array(
				'title' => 'Площадь земельного участка, сот.'
			)),
			new Entity\FloatField('DISTANCE_TOWN',array(
				'title' => 'Удаленность от города, км.'
			)),
			new Entity\IntegerField('FLOOR',array(
				'title' => 'Этаж'
			)),
			new Entity\IntegerField('FLOORS',array(
				'title' => 'Этажность дома'
			)),
			new Entity\StringField('CITY',array(
				'title' => 'Город'
			)),
			new Entity\StringField('AREA',array(
				'title' => 'Район'
			)),
			new Entity\DateField('DATE_BUY',array(
				'title' => 'Дата покупки'
			))
		);
	}
}