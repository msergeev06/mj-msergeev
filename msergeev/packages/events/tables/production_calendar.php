<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class ProductionCalendarTable extends DataManager {
	public static function getTableName () {
		return 'ms_events_production_calendar';
	}
	public static function getTableTitle () {
		return 'Производственный календарь';
	}
	public static function getMap () {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\IntegerField('YEAR',array(
				'required' => true,
				'default_value' => 'date("Y")',
				'title' => 'Год'
			)),
			new Entity\IntegerField('MONTH',array(
				'required' => true,
				'default_value' => 'date("m")',
				'title' => 'Месяц'
			)),
			new Entity\IntegerField('DAY',array(
				'required' => true,
				'default_value' => 'date("d")',
				'title' => 'День'
			)),
			new Entity\BooleanField('WEEKEND_DAY',array(
				'required' => true,
				'default_value' => true,
				'title' => 'Выходной день'
			))
		);
	}
	public static function getArrayDefaultValues () {
		return array(
			array(
				'DAY' => 1,
				'MONTH' => 1,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 4,
				'MONTH' => 1,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 5,
				'MONTH' => 1,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 6,
				'MONTH' => 1,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 7,
				'MONTH' => 1,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 8,
				'MONTH' => 1,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 20,
				'MONTH' => 2,
				'YEAR' => 2016,
				'WEEKEND_DAY' => false
			),
			array(
				'DAY' => 22,
				'MONTH' => 2,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 23,
				'MONTH' => 2,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 7,
				'MONTH' => 3,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 8,
				'MONTH' => 3,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 2,
				'MONTH' => 5,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 3,
				'MONTH' => 5,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 9,
				'MONTH' => 5,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 13,
				'MONTH' => 6,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			),
			array(
				'DAY' => 4,
				'MONTH' => 11,
				'YEAR' => 2016,
				'WEEKEND_DAY' => true
			)
		);
	}
}