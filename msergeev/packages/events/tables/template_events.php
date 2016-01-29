<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class TemplateEventsTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_template_events';
	}
	public static function getTableTitle() {
		return 'Шаблоны событий';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID шаблона событий'
			)),
			new Entity\IntegerField('TEMPLATE_NOTICE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_events_template_notice.ID',
				'title' => 'ID шаблона напоминания'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Имя шаблона событии'
			)),
			new Entity\IntegerField('DAY',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'День начала события'
			)),
			new Entity\IntegerField('MONTH',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Месяц начала события'
			)),
			new Entity\IntegerField('YEAR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Год начала события'
			)),
			new Entity\IntegerField('HOUR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Час начала события'
			)),
			new Entity\IntegerField('MIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Минута начала события'
			)),
			new Entity\BooleanField('MONDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Понедельник'
			)),
			new Entity\BooleanField('TUESDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события во Вторник'
			)),
			new Entity\BooleanField('WEDNESDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Среду'
			)),
			new Entity\BooleanField('THURSDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Четверг'
			)),
			new Entity\BooleanField('FRIDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Пятницу'
			)),
			new Entity\BooleanField('SATURDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Субботу'
			)),
			new Entity\BooleanField('SUNDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Воскресенье'
			)),
			new Entity\BooleanField('WORKDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Рабочие дни'
			)),
			new Entity\BooleanField('WEEKEND',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Начало события в Выходные дни'
			)),
			new Entity\BooleanField('REPEAT',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяемое событие'
			)),
			new Entity\IntegerField('EVERY_MIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Минуты повтора'
			)),
			new Entity\IntegerField('EVERY_HOUR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Часы повтора'
			)),
			new Entity\IntegerField('EVERY_DAY',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Дни повтора'
			)),
			new Entity\IntegerField('EVERY_MONTH',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Месяцы повтора'
			)),
			new Entity\IntegerField('EVERY_YEAR',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Годы повтора'
			)),
			new Entity\BooleanField('EVERY_MONDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Понедельникам'
			)),
			new Entity\BooleanField('EVERY_TUESDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Вторникам'
			)),
			new Entity\BooleanField('EVERY_WEDNESDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Средам'
			)),
			new Entity\BooleanField('EVERY_THURSDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Четвергам'
			)),
			new Entity\BooleanField('EVERY_FRIDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Пятницам'
			)),
			new Entity\BooleanField('EVERY_SATURDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Субботам'
			)),
			new Entity\BooleanField('EVERY_SUNDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Воскресеньям'
			)),
			new Entity\BooleanField('EVERY_WORKDAY',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Рабочим дням'
			)),
			new Entity\BooleanField('EVERY_WEEKEND',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Повторяется по Выходным дням'
			)),
			new Entity\IntegerField('TYPE_ID',array(
				'required' => true,
				'link' => 'ms_events_types.TYPE_ID',
				'title' => 'ID типа события'
			))
		);
	}
}