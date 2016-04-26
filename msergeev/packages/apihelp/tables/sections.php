<?php

namespace MSergeev\Packages\Apihelp\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class SectionsTable extends Lib\DataManager
{
	public static function getTableName()
	{
		return 'ms_apihelp_sections';
	}
	public static function getTableTitle()
	{
		return 'Разделы помощи';
	}
	public static function getTableLinks()
	{
		return array(
			'ID' => array(
				'ms_apihelp_sections' => 'PARENT',
				'ms_apihelp_sections' => 'LEFT_MARGIN',
				'ms_apihelp_sections' => 'RIGHT_MARGIN',
				'ms_apihelp_pages' => 'SECTION_ID'
			)
		);
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID раздела'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название раздела'
			)),
			new Entity\IntegerField('DEPTH_LEVEL',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Уровень вложенности раздела'
			)),
			new Entity\IntegerField('PARENT',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_apihelp_sections.ID',
				'title' => 'Родительский раздел'
			)),
			new Entity\IntegerField('LEFT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_apihelp_sections.ID',
				'title' => 'Левая граница'
			)),
			new Entity\IntegerField('RIGHT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_apihelp_sections.ID',
				'title' => 'Правая граница'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Описание раздела'
			)),
			new Entity\StringField('DESCRIPTION_TYPE',array(
				'required' => true,
				'default_value' => 'html',
				'title' => 'Тип описания раздела html/text'
			))
		);
	}
}