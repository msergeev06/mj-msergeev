<?php

namespace MSergeev\Packages\Events\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class PlayMusicTable extends DataManager {
	public static function getTableName() {
		return 'ms_events_play_music';
	}
	public static function getTableTitle() {
		return 'Воспроизвести музыку';
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
			new Entity\TextField('FILE',array(
				'required' => true,
				'title' => 'Путь к файлу'
			)),
			new Entity\IntegerField('VOLUME',array(
				'required' => true,
				'default_value' => 100,
				'title' => 'Громкость'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			))
		);
	}
}