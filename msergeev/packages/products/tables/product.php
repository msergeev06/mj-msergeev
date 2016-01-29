<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class ProductTable extends DataManager {
	public static function getTableName() {
		return 'ms_products_product';
	}
	public static function getTableTitle() {
		return 'Товары';
	}
	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_products_freezer' => 'PRODUCT_ID',
				'ms_products_shopping' => 'PRODUCT_ID'
			)
		);
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID категории'
			)),
			new Entity\StringField ('BAR_CODE', array(
				"required" => true,
				"title" => 'Штрихкод товара'
			)),
			new Entity\StringField ('NAME', array(
				"required" => true,
				"title" => 'Название товара'
			)),
			new Entity\StringField ('SHORT', array(
				"column_name" => "SHORT_NAME",
				"title" => 'Краткое название продукта'
			)),
			new Entity\IntegerField ('CATEGORY_ID', array(
				"required" => true,
				"default_value" => 0,
				"title" => 'ID категории товаров'
			)),
			new Entity\StringField ('IMG', array(
				"title" => 'Путь к изображению товара'
			)),
			new Entity\IntegerField ('MEASURE_ID', array(
				"required" => true,
				"default_value" => 1,
				"title" => 'ID единицы измерения'
			)),
			new Entity\BooleanField ('PERSONAL', array(
				"required" => true,
				"default_value" => false,
				"title" => 'Личный товар'
			)),
			new Entity\StringField ('LIFE', array(
				"title" => "Максимальный срок хранения продукта"
			))
		);
	}
}