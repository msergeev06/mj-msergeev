<?php

namespace MSergeev\Packages\Apihelp\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class PagesTable extends Lib\DataManager
{
	public static function getTableName()
	{
		return 'ms_apihelp_pages';
	}
	public static function getTableTitle()
	{
		return 'Страницы помощи';
	}
	public static function getLinks()
	{
		return array(
			'ID' => array(
				'ms_apihelp_sections_pages' => 'SECTION_ID'
			)
		);
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID страницы'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название страницы'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Текст страницы'
			)),
			new Entity\StringField('DESCRIPTION_TYPE',array(
				'required' => true,
				'default' => 'html',
				'title' => 'Тип текста страницы html/text'
			))
		);
	}
}