<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class ShopTable extends DataManager {
	public static function getTableName() {
		return 'ms_products_shop';
	}
	public static function getTableTitle() {
		return 'Магазины';
	}
	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_products_shopping' => 'SHOP_ID'
			)
		);
	}
	public static function getMap() {
		return array (
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID магазина'
			)),
			new Entity\StringField ('NAME', array(
				"require" => true,
				"title" => 'Название магазина'
			)),
			new Entity\StringField ('CODE', array(
				"title" => 'Код магазина'
			)),
			new Entity\StringField ('SHORT_NAME', array(
				"title" => 'Краткое название магазина'
			)),
			new Entity\IntegerField ('SORT', array(
				"require" => true,
				"default_value" => 500,
				"title" => 'Сортировка'
			)),
			new Entity\IntegerField ('CITY_ID', array(
				"require" => true,
				"link" => 'ms_products_city.ID',
				"default_value" => 0,
				"title" => "ID Города"
			)),
			new Entity\IntegerField ('POPULAR', array(
				"require" => true,
				"default_value" => 0,
				"title" => 'Популярность'
			)),
			new Entity\TextField ('ADDRESS', array(
				"title" => 'Адрес магазина'
			)),
			new Entity\TextField ('DESCRIPTION', array(
				"title" => 'Описание магазина'
			))
		);
	}
}