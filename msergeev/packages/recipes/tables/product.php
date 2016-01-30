<?php

namespace MSergeev\Packages\Recipes\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class ProductTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_recipes_product';
	}
	public static function getTableTitle()
	{
		return 'Продукты';
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID продукта'
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
			new Entity\IntegerField('POPULAR',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Частота использования продукта'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название продукта'
			))
		);
	}
	public static function getArrayDefaultValues()
	{
		return array(
			array('NAME' => 'Варенье'),
			array('NAME' => 'Вода'),
			array('NAME' => 'Горох лущеный'),
			array('NAME' => 'Фасоль'),
			array('NAME' => 'Чечевица'),
			array('NAME' => 'Грибы сушенные'),
			array('NAME' => 'Джем'),
			array('NAME' => 'Дрожжи хлебопекарные'),
			array('NAME' => 'Желатин (порошкообразный)'),
			array('NAME' => 'Изюм'),
			array('NAME' => 'Какао-порошок'),
			array('NAME' => 'Картофельный крахмал'),
			array('NAME' => 'Кофе натуральный молотый'),
			array('NAME' => 'Кукурузные хлопья'),
			array('NAME' => 'Геркулес'),
			array('NAME' => 'Гречневая (ядрица) крупа'),
			array('NAME' => 'Кукурузная крупа'),
			array('NAME' => 'Манная крупа'),
			array('NAME' => 'Овсяная крупа'),
			array('NAME' => 'Рисовая крупа'),
			array('NAME' => 'Перловая крупа'),
			array('NAME' => 'Пшеничная крупа'),
			array('NAME' => 'Пшено'),
			array('NAME' => 'Саго'),
			array('NAME' => 'Ячневая крупа'),
			array('NAME' => 'Ликер'),
			array('NAME' => 'Лимонная кислота (кристаллы)'),
			array('NAME' => 'Мак'),
			array('NAME' => 'Майонез'),
			array('NAME' => 'Маргарин (растопленный)'),
			array('NAME' => 'Макароны'),
			array('NAME' => 'Мед'),
			array('NAME' => 'Масло растительное'),
			array('NAME' => 'Масло сливочное'),
			array('NAME' => 'Масло сливочное топленое'),
			array('NAME' => 'Мед (в жидком состоянии)'),
			array('NAME' => 'Молоко'),
			array('NAME' => 'Ряженка'),
			array('NAME' => 'Кефир'),
			array('NAME' => 'Йогурт'),
			array('NAME' => 'Молоко сгущенное'),
			array('NAME' => 'Молоко сухое'),
			array('NAME' => 'Мука крупчатка'),
			array('NAME' => 'Мука кукурузная'),
			array('NAME' => 'Мука пшеничная'),
			array('NAME' => 'Мука ржаная'),
			array('NAME' => 'Арахис чищенный'),
			array('NAME' => 'Грецкие (ядро)'),
			array('NAME' => 'Кедровые'),
			array('NAME' => 'Миндаль (ядро)'),
			array('NAME' => 'Орехи толченные'),
			array('NAME' => 'Фундук (ядро)'),
			array('NAME' => 'Овсяные хлопья'),
			array('NAME' => 'Пшеничные хлопья'),
			array('NAME' => 'Повидло'),
			array('NAME' => 'Простокваша'),
			array('NAME' => 'Сметана 10%'),
			array('NAME' => 'Сметана 30%'),
			array('NAME' => 'Сало растопленное'),
			array('NAME' => 'Сахар-песок'),
			array('NAME' => 'Сахарная пудра'),
			array('NAME' => 'Сливки 20%'),
			array('NAME' => 'Сливки сгущенные с сахаром'),
			array('NAME' => 'Сода питьевая'),
			array('NAME' => 'Соки (фруктовые, овощные)'),
			array('NAME' => 'Соль'),
			array('NAME' => 'Гвоздика молотая'),
			array('NAME' => 'Гвоздика целая'),
			array('NAME' => 'Горчица'),
			array('NAME' => 'Горчица сухая'),
			array('NAME' => 'Имбирь молотый'),
			array('NAME' => 'Корица молотая'),
			array('NAME' => 'Перец душистый горошком'),
			array('NAME' => 'Перец душистый молотый'),
			array('NAME' => 'Перец черный молотый'),
			array('NAME' => 'Перец черный горошком'),
			array('NAME' => 'Сухари молотые'),
			array('NAME' => 'Сухофрукты'),
			array('NAME' => 'Творог жирный'),
			array('NAME' => 'Творог нежирный'),
			array('NAME' => 'Творог диетический, мягкий'),
			array('NAME' => 'Творожная масса'),
			array('NAME' => 'Томатная паста'),
			array('NAME' => 'Томатный соус'),
			array('NAME' => 'Уксус'),
			array('NAME' => 'Брусника'),
			array('NAME' => 'Вишня'),
			array('NAME' => 'Голубика'),
			array('NAME' => 'Ежевика'),
			array('NAME' => 'Клубника'),
			array('NAME' => 'Клюква'),
			array('NAME' => 'Крыжовник'),
			array('NAME' => 'Малина'),
			array('NAME' => 'Смородина красная'),
			array('NAME' => 'Смородина черная'),
			array('NAME' => 'Черешня'),
			array('NAME' => 'Черника'),
			array('NAME' => 'Шелковица'),
			array('NAME' => 'Шиповник засушенный'),
			array('NAME' => 'Чай'),
			array('NAME' => 'Яичный порошок'),
			//array('NAME' => ''),
		);
	}
}