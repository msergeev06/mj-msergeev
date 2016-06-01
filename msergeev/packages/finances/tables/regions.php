<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class RegionsTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_regions';
	}

	public static function getTableTitle ()
	{
		return 'Регионы';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_account_car' => 'REGION_ID'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID региона'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название региона'
			))
		);
	}


	public static function getArrayDefaultValues ()
	{//http://hramy.ru/regions/regfull.htm
		return array(
			array("ID" => 1,"NAME" => "Адыгея, республика"),
			array("ID" => 2,"NAME" => "Башкортостан, республика"),
			array("ID" => 3,"NAME" => "Бурятия, республика"),
			array("ID" => 4,"NAME" => "Алтай, республика"),
			array("ID" => 5,"NAME" => "Дагестан, республика"),
			array("ID" => 6,"NAME" => "Ингушетия, республика"),
			array("ID" => 7,"NAME" => "Кабардино-Балкарская республика"),
			array("ID" => 8,"NAME" => "Калмыкия, республика"),
			array("ID" => 9,"NAME" => "Карачаево-Черкесия, республика"),
			array("ID" => 10,"NAME" => "Карелия, республика"),
			array("ID" => 11,"NAME" => "Коми, республика"),
			array("ID" => 12,"NAME" => "Марий Эл, республика"),
			array("ID" => 13,"NAME" => "Мордовия, республика"),
			array("ID" => 14,"NAME" => "Саха (Якутия), республика"),
			array("ID" => 15,"NAME" => "Северная Осетия-Алания, республика"),
			array("ID" => 16,"NAME" => "Татарстан, республика"),
			array("ID" => 17,"NAME" => "Тыва, республика"),
			array("ID" => 18,"NAME" => "Удмуртская Республика"),
			array("ID" => 19,"NAME" => "Хакасия, республика"),
			array("ID" => 21,"NAME" => "Чувашская Республика"),
			array("ID" => 22,"NAME" => "Алтайский край"),
			array("ID" => 23,"NAME" => "Краснодарский край"),
			array("ID" => 24,"NAME" => "Красноярский край"),
			array("ID" => 25,"NAME" => "Приморский край"),
			array("ID" => 26,"NAME" => "Ставропольский край"),
			array("ID" => 27,"NAME" => "Хабаровский край"),
			array("ID" => 28,"NAME" => "Амурская область"),
			array("ID" => 29,"NAME" => "Архангельская область"),
			array("ID" => 30,"NAME" => "Астраханская область"),
			array("ID" => 31,"NAME" => "Белгородская область"),
			array("ID" => 32,"NAME" => "Брянская область"),
			array("ID" => 33,"NAME" => "Владимирская область"),
			array("ID" => 34,"NAME" => "Волгоградская область"),
			array("ID" => 35,"NAME" => "Вологодская область"),
			array("ID" => 36,"NAME" => "Воронежская область"),
			array("ID" => 37,"NAME" => "Ивановская область"),
			array("ID" => 38,"NAME" => "Иркутская область"),
			array("ID" => 39,"NAME" => "Калининградская область"),
			array("ID" => 40,"NAME" => "Калужская область"),
			array("ID" => 41,"NAME" => "Камчатский край"),
			array("ID" => 42,"NAME" => "Кемеровская область"),
			array("ID" => 43,"NAME" => "Кировская область"),
			array("ID" => 44,"NAME" => "Костромская область"),
			array("ID" => 45,"NAME" => "Курганская область"),
			array("ID" => 46,"NAME" => "Курская область"),
			array("ID" => 78,"SORT"=>200,"NAME" => "Санкт-Петербург"),
			array("ID" => 47,"SORT"=>250,"NAME" => "Ленинградская область"),
			array("ID" => 48,"NAME" => "Липецкая область"),
			array("ID" => 49,"NAME" => "Магаданская область"),
			array("ID" => 77,"SORT"=>100,"NAME" => "Москва"),
			array("ID" => 50,"SORT"=>150,"NAME" => "Московская область"),
			array("ID" => 51,"NAME" => "Мурманская область"),
			array("ID" => 52,"NAME" => "Нижегородская область"),
			array("ID" => 53,"NAME" => "Новгородская область"),
			array("ID" => 54,"NAME" => "Новосибирская область"),
			array("ID" => 55,"NAME" => "Омская область"),
			array("ID" => 56,"NAME" => "Оренбургская область"),
			array("ID" => 57,"NAME" => "Орловская область"),
			array("ID" => 58,"NAME" => "Пензенская область"),
			array("ID" => 59,"NAME" => "Пермский край"),
			array("ID" => 60,"NAME" => "Псковская область"),
			array("ID" => 61,"NAME" => "Ростовская область"),
			array("ID" => 62,"NAME" => "Рязанская область"),
			array("ID" => 63,"NAME" => "Самарская область"),
			array("ID" => 64,"NAME" => "Саратовская область"),
			array("ID" => 65,"NAME" => "Сахалинская область"),
			array("ID" => 66,"NAME" => "Свердловская область"),
			array("ID" => 67,"NAME" => "Смоленская область"),
			array("ID" => 68,"NAME" => "Тамбовская область"),
			array("ID" => 69,"NAME" => "Тверская область"),
			array("ID" => 70,"NAME" => "Томская область"),
			array("ID" => 71,"NAME" => "Тульская область"),
			array("ID" => 72,"NAME" => "Тюменская область"),
			array("ID" => 73,"NAME" => "Ульяновская область"),
			array("ID" => 74,"NAME" => "Челябинская область"),
			array("ID" => 75,"NAME" => "Забайкальский край"),
			array("ID" => 76,"NAME" => "Ярославская область"),
			array("ID" => 79,"NAME" => "Еврейская автономная область"),
			array("ID" => 83,"NAME" => "Ненецкий автономный округ"),
			array("ID" => 86,"NAME" => "Ханты-Мансийский автономный округ - Югра"),
			array("ID" => 87,"NAME" => "Чукотский автономный округ"),
			array("ID" => 89,"NAME" => "Ямало-Ненецкий автономный округ"),
			array("ID" => 92,"SORT"=>300,"NAME" => "Севастополь"),
			array("ID" => 91,"SORT"=>350,"NAME" => "Крым, республика"),
			array("ID" => 95,"NAME" => "Чеченская Республика")
		);
	}
}