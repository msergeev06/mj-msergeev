<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class CategoriesTable extends DataManager {

	public static function getTableName() {
		return 'ms_products_categories';
	}

	public static function getTableTitle() {
		return 'Системные категории товаров';
	}

	public static function getMap () {
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID категории'
			)),
			new Entity\StringField ('NAME', array(
				"required" => true,
				"title" => 'Название категории'
			)),
			new Entity\IntegerField ('SORT', array(
				"required" => true,
				"default_value" => 500,
				"title" => 'Сортировка'
			)),
			new Entity\StringField ('CODE', array(
				"required" => true,
				"run" => array(
					"function" => "\\MSergeev\\Core\\Lib\\Tools::generateCode()",
					"column" => 'NAME'
				),
				"unique" => true,
				'title' => 'Код раздела'
			)),
			new Entity\IntegerField ('LEVEL', array(
				"default_value" => 0,
				"required" => true,
				"title" => 'Уровень вложенности'
			)),
			new Entity\IntegerField ('PARENT', array(
				"default_value" => 0,
				"required" => true,
				"title" => 'Родительский раздел'
			)),
			new Entity\IntegerField ('POPULAR', array(
				"required" => true,
				"default_value" => 0,
				"title" => 'Популярность категории'
			))
		);
	}

}