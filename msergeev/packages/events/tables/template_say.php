<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class TemplateSayTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_template_say';
	}
	public static function getTableTitle() {
		return 'Шаблон сказать';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID шаблона'
			)),
			new Entity\IntegerField('TEMPLATE_NOTICE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_events_template_notice.ID',
				'title' => 'ID шаблона напоминания'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Имя шаблона'
			)),
			new Entity\StringField('SAY',array(
				'required' => true,
				'title' => 'Фраза для произношения'
			)),
			new Entity\FloatField('LEVEL',array(
				'required' => true,
				'default_value' => 100,
				'title' => 'Уровень громкости'
			))
		);
	}
}