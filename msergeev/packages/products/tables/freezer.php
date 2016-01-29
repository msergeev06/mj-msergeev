<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class FreezerTable extends DataManager {
	public static function getTableName() {
		return 'ms_products_freezer';
	}
	public static function getTableTitle() {
		return 'Товары в наличае';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID записи'
			)),
			new Entity\IntegerField ('PRODUCT_ID', array(
				"required" => true,
				"link" => 'ms_products_product.ID',
				"default_value" => 0,
				"title" => 'ID товара'
			)),
			new Entity\DateField ('SHOPPING_DATE', array(
				"required" => true,
				"default_value" => 'MSergeev\Core\Entity\Date::getDateDBTimestamp',
				"title" => 'Дата покупки'
			)),
			new Entity\FloatField ('COUNT', array(
				"required" => true,
				"default_value" => 1,
				"title" => 'Количество купленного'
			)),
			new Entity\FloatField ('DELETED', array(
				"required" => true,
				"default_value" => 0,
				"title" => 'Количество выброшенного'
			))
		);
	}
}