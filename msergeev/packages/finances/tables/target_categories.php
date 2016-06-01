<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class TargetCategoriesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_target_categories';
	}

	public static function getTableTitle ()
	{
		return 'Категории цели';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID категории'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\IntegerField('TARGET_TYPE',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Тип цели (1-накопить, 0-выплатить)'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название'
			))
		);
	}

	public static function getArrayDefaultValues ()
	{
		return array(
			array('NAME' => 'Автомобиль'),
			array('NAME' => 'Бытовая техника'),
			array('NAME' => 'Дом'),
			array('NAME' => 'Земельный участок'),
			array('NAME' => 'Квартира'),
			array('NAME' => 'Компьютер'),
			array('NAME' => 'Лечение'),
			array('NAME' => 'Мебель'),
			array('NAME' => 'Мотоцикл'),
			array('NAME' => 'Образование'),
			array('NAME' => 'Отпуск'),
			array('SORT'=> 1000, 'NAME' => 'Прочее'),
			array('NAME' => 'Ремонт квартиры/дома'),
			array('NAME' => 'Свадьба'),
			array('NAME' => 'Финансовая подушка'),
			array('NAME' => 'Шуба'),
			array('NAME' => 'Электроника'),
			array('NAME' => 'Ювелирные украшения'),
			array('TARGET_TYPE'=>0,'NAME' => 'Долг по ипотеке'),
			array('TARGET_TYPE'=>0,'NAME' => 'Долг по кредитам'),
			array('TARGET_TYPE'=>0,'NAME' => 'Долг по кредитным картам'),
			array('TARGET_TYPE'=>0,'SORT'=> 1000,'NAME' => 'Прочие долги')
		);
	}
}