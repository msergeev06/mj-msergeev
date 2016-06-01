<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountCarTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_account_car';
	}

	public static function getTableTitle ()
	{
		return 'Счет, связанный с автомобилем';
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
			new Entity\StringField('BRAND',array(
				'title' => 'Марка'
			)),
			new Entity\StringField('MODEL',array(
				'title' => 'Модель'
			)),
			new Entity\StringField('MODIFICATION',array(
				'title' => 'Модификация'
			)),
			new Entity\IntegerField('FUEL_TYPE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_fuel_types.ID',
				'title' => 'Тип топлива'
			)),
			new Entity\IntegerField('GEARBOX_TYPE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_gearbox_types.ID',
				'title' => 'Тип коробки передач'
			)),
			new Entity\IntegerField('COLOR_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_colors.ID',
				'title' => 'Цвет'
			)),
			new Entity\IntegerField('CREATE_YEAR',array(
				'title' => 'Год выпуска'
			)),
			new Entity\FloatField('ENGINE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Объем двигателя, л'
			)),
			new Entity\IntegerField('REGION_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_regions.ID',
				'title' => 'Регион регистации'
			)),
			new Entity\FloatField('START_ODO',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Начальный пробег, км.'
			)),
			new Entity\DateField('DATE_BUY',array(
				'title' => 'Дата покупки'
			))
		);
	}
}