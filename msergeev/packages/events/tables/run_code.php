<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class RunCodeTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_run_code';
	}
	public static function getTableTitle() {
		return 'Выполнить код';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID кода'
			)),
			new Entity\IntegerField('NOTICE_ID',array(
				'required' => true,
				'link' => 'ms_events_notice.ID',
				'title' => 'ID напоминания'
			)),
			new Entity\StringField('NAME',array(
				'title' => 'Имя действия'
			)),
			new Entity\TextField('CODE',array(
				'required' => true,
				'title' => 'PHP код'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			))
		);
	}
}