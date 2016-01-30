<?php

namespace MSergeev\Packages\Wonthave\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class WantTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_wanthave_want';
	}

	public static function getTableTitle()
	{
		return 'Желания';
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID желания'
			)),
			new Entity\IntegerField('COLLECTION_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_wanthave_collection.ID',
				'title' => 'Раздел желаний'
			)),
			new Entity\BooleanField('ACTIVE',array(
				'required' => true,
				'default_value' => true,
				'title' => 'Активность'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Наименование желания'
			)),
			new Entity\BooleanField('HIDDEN',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Желание видит только владелец'
			)),
			new Entity\StringField('URL',array(
				'title' => 'Ссылка'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Описание желания'
			)),
			new Entity\FloatField('COST',array(
				'title' => 'Стоимость'
			)),
			new Entity\DateField('TO_DATE',array(
				'title' => 'Дата, когда получить'
			))
		);
	}
}