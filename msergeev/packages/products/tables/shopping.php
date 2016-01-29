<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class ShoppingTable extends DataManager {
	public static function getTableName() {
		return 'ms_products_shopping';
	}
	public static function getTableTitle() {
		return 'Покупки в магазинах';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID категории'
			)),
			new Entity\DateField ('SHOPPING_DATE', array(
				"required" => true,
				"default_value" => 'date("Y-m-d")',
				"title" => 'Дата покупки'
			)),
			new Entity\IntegerField ('SHOP_ID', array(
				"required" => true,
				"link" => 'ms_products_shop.ID',
				"default_value" => 0,
				"title" => 'ID магазина'
			)),
			new Entity\FloatField ('PRICE', array(
				"required" => true,
				"title" => 'Цена товара'
			)),
			new Entity\IntegerField ('PRODUCT_ID', array(
				"required" => true,
				"link" => 'ms_products_product.ID',
				"title" => 'ID товара'
			))
		);
	}
}