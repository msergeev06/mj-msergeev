<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class CollectionsTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_collections';
	}
	public static function getTableTitle() {
		return 'Коллекции событий';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField ('ID', array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID коллекции'
			)),
			new Entity\StringField ('NAME', array(
				'required' => true,
				'title' => 'Название коллекции'
			)),
			new Entity\IntegerField ('SORT', array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			)),
			new Entity\IntegerField ('USER_ID', array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Пользователь коллекции'
			))
		);
	}
}