<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class CreateTaskTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_create_task';
	}
	public static function getTableTitle() {
		return 'Создание задачи';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID создания задачи'
			)),
			new Entity\IntegerField('NOTICE_ID',array(
				'required' => true,
				'link' => 'ms_events_notice.ID',
				'title' => 'ID напоминания'
			)),
			new Entity\StringField('MODULE_ID',array(
				'required' => true,
				'default_value' => 'msergeev:tasks',
				'title' => 'ID модуля задач'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Имя задачи'
			)),
			new Entity\IntegerField('DEADLINE_MIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Срок выполнения X минут'
			)),
			new Entity\IntegerField('DEADLINE_HOUR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Срок выполнения X часов'
			)),
			new Entity\IntegerField('DEADLINE_DAY',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Срок выполнения X дней'
			)),
			new Entity\IntegerField('DEADLINE_MONTH',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Срок выполнения X месяцев'
			)),
			new Entity\IntegerField('DEADLINE_YEAR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Срок выполнения X лет'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			))
		);
	}
}