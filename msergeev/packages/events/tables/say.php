<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class SayTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_say';
	}
	public static function getTableTitle() {
		return 'Сказать';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\IntegerField('NOTICE_ID',array(
				'required' => true,
				'link' => 'ms_events_notice.ID',
				'title' => 'ID напоминания'
			)),
			new Entity\StringField('SAY',array(
				'required' => true,
				'title' => 'Фраза для произношения'
			)),
			new Entity\FloatField('LEVEL',array(
				'required' => true,
				'default_value' => 100,
				'title' => 'Уровень громкости'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			))
		);
	}
}