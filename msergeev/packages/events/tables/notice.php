<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class NoticeTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_notice';
	}
	public static function getTableTitle() {
		return 'Напоминания';
	}
	public static function getTableLinks() {
		return array(
			'ID' => array(
				'ms_events_run_code' => 'NOTICE_ID',
				'ms_events_create_task' => 'NOTICE_ID',
				'ms_events_play_music' => 'NOTICE_ID',
				'ms_events_say' => 'NOTICE_ID'
			)
		);
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID напоминания'
			)),
			new Entity\IntegerField('EVENTS_ID',array(
				'required' => true,
				'link' => 'ms_events_events.ID',
				'title' => 'ID события'
			)),
			new Entity\IntegerField('NOTICE_HOUR',array(
				'required' => true,
				'default_value' => 12,
				'title' => 'Напомнить в X часов'
			)),
			new Entity\IntegerField('NOTICE_MIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Напомнить в X минут'
			)),
			new Entity\IntegerField('IN_MIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Напомнить за X минут'
			)),
			new Entity\IntegerField('IN_HOUR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Напомнить за X часов'
			)),
			new Entity\IntegerField('IN_DAY',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Напомнить за X дней'
			)),
			new Entity\IntegerField('IN_MONTH',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Напомнить за X месяцев'
			)),
			new Entity\IntegerField('IN_YEAR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Напомнить за X лет'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			))
		);
	}
}