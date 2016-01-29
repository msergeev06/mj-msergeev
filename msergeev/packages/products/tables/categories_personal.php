<?php

namespace MSergeev\Packages\Products\Tables;

class CategoriesPersonalTable extends CategoriesTable {
	public static function getTableName() {
		return 'ms_products_categories_personal';
	}

	public static function getTableTitle () {
		return 'Персональные категории товаров';
	}


}