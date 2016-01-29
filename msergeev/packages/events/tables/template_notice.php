<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class TemplateNoticeTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_template_notice';
	}
	public static function getTableTitle() {
		return 'Шаблон напоминаний';
	}
	public static function getTableLinks(){
		return array(
			'ID' => array(
				'ms_events_template_code' => 'TEMPLATE_NOTICE_ID',
				'ms_events_template_create_task' => 'TEMPLATE_NOTICE_ID',
				'ms_events_template_events' => 'TEMPLATE_NOTICE_ID',
				'ms_events_template_play_music' => 'TEMPLATE_NOTICE_ID',
				'ms_events_template_say' => 'TEMPLATE_NOTICE_ID'
			)
		);
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID шаблона напоминания'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Имя шаблона'
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