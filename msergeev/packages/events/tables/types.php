<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class TypesTable extends DataManager {
	public static function getTableName () {
		return 'ms_events_types';
	}
	public static function getTableTitle() {
		return 'Типы событий';
	}
	public static function getTableLinks() {
		return array(
			'ID' => array(
				'ms_events_events' => 'TYPES_ID'
			)
		);
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField ('ID', array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID типа события'
			)),
			new Entity\StringField ('NAME', array(
				'required' => true,
				'title' => 'Название типа события'
			)),
			new Entity\IntegerField ('SORT', array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			)),
			new Entity\StringField ('ICON', array(
				'title' => 'Иконка типа события'
			))
		);
	}
	public static function getArrayDefaultValues () {
		return array(
			0 => array(
				'ID' => 1,
				'NAME' => 'День рождения',
				'SORT' => 10,
				'ICON' => 'birthday.png'
			),
			1 => array(
				'ID' => 2,
				'NAME' => 'Праздник',
				'SORT' => 20,
				'ICON' => 'balloon.png'
			)
		);
	}
}