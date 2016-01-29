<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class TemplatePlayMusicTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_template_play_music';
	}
	public static function getTableTitle() {
		return 'Шаблон воспроизведения музыки';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\IntegerField('TEMPLATE_NOTICE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_events_template_notice.ID',
				'title' => 'ID шаблона напоминания'
			)),
			new Entity\IntegerField('NAME',array(
				'required' => true,
				'title' => 'Имя шаблона'
			)),
			new Entity\TextField('FILE',array(
				'required' => true,
				'title' => 'Путь к файлу'
			))
		);
	}
}