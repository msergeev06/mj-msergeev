<?php

namespace MSergeev\Packages\Apihelp\Lib;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class SectionsPagesTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_apihelp_sections_pages';
	}
	public static function getTableTitle()
	{
		return 'Привязка страниц к разделам';
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\IntegerField('SECTION_ID',array(
				'required' => true,
				'link' => 'ms_apihelp_sections.ID',
				'title' => 'ID раздела'
			)),
			new Entity\IntegerField('PAGE_ID',array(
				'required' => true,
				'link' => 'ms_apihelp_pages.ID',
				'title' => 'ID страницы'
			))
		);
	}
}