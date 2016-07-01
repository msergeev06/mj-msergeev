<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class CategoriesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_categories';
	}

	public static function getTableTitle ()
	{
		return 'Категории расходов и доходов';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_categories' => 'PARENT_SECTION_ID',
				'ms_finances_procedures' => 'CATEGORY_ID'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID категории'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название раздела'
			)),
			new Entity\IntegerField('DEPTH_LEVEL',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Уровень вложенности раздела'
			)),
			new Entity\IntegerField('PARENT_SECTION_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_categories.ID',
				'title' => 'Родительский раздел'
			)),
			new Entity\IntegerField('LEFT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Левая граница'
			)),
			new Entity\IntegerField('RIGHT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Правая граница'
			)),
			new Entity\BooleanField('SYSTEM',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Системная категория'
			)),
			new Entity\BooleanField('INCOME',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Доход или расход'
			))
		);
	}

	public static function getArrayDefaultValues ()
	{
		return array(
			array(
				"ID" => 1,
				"NAME" => "Автомобиль",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 1,
				"RIGHT_MARGIN" => 20,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 2,
				"NAME" => "Аренда автомобиля",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 2,
				"RIGHT_MARGIN" => 3,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 3,
				"NAME" => "Мойка автомобиля",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 4,
				"RIGHT_MARGIN" => 5,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 4,
				"NAME" => "Платные дороги",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 6,
				"RIGHT_MARGIN" => 7,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 5,
				"NAME" => "Штрафы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 8,
				"RIGHT_MARGIN" => 9,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 6,
				"NAME" => "Стоянка",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 10,
				"RIGHT_MARGIN" => 11,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 7,
				"NAME" => "ТО",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 12,
				"RIGHT_MARGIN" => 13,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 8,
				"NAME" => "Ремонт автомобиля",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 14,
				"RIGHT_MARGIN" => 15,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 9,
				"NAME" => "Топливо",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 16,
				"RIGHT_MARGIN" => 17,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 10,
				"NAME" => "Транспортный налог",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 18,
				"RIGHT_MARGIN" => 19,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 11,
				"NAME" => "Банковское обслуживание",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 21,
				"RIGHT_MARGIN" => 26,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 12,
				"NAME" => "Комиссия банкомата",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 11,
				"LEFT_MARGIN" => 22,
				"RIGHT_MARGIN" => 23,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 13,
				"NAME" => "Услуги банка",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 11,
				"LEFT_MARGIN" => 24,
				"RIGHT_MARGIN" => 25,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 14,
				"NAME" => "Вредные привычки",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 27,
				"RIGHT_MARGIN" => 30,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 15,
				"NAME" => "Алкаголь, табачные изделия",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 14,
				"LEFT_MARGIN" => 28,
				"RIGHT_MARGIN" => 29,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 16,
				"NAME" => "Дети",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 31,
				"RIGHT_MARGIN" => 44,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 17,
				"NAME" => "Детская одежда и обувь",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 16,
				"LEFT_MARGIN" => 32,
				"RIGHT_MARGIN" => 33,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 18,
				"NAME" => "Детские врачи",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 16,
				"LEFT_MARGIN" => 34,
				"RIGHT_MARGIN" => 35,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 19,
				"NAME" => "Детское питание и гигиена",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 16,
				"LEFT_MARGIN" => 36,
				"RIGHT_MARGIN" => 37,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 20,
				"NAME" => "Игрушки",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 16,
				"LEFT_MARGIN" => 38,
				"RIGHT_MARGIN" => 39,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 21,
				"NAME" => "Образование детей",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 16,
				"LEFT_MARGIN" => 40,
				"RIGHT_MARGIN" => 41,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 22,
				"NAME" => "Хобби, спорт, увлечения детей",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 16,
				"LEFT_MARGIN" => 42,
				"RIGHT_MARGIN" => 43,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 23,
				"NAME" => "Домашнее хозяйство",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 45,
				"RIGHT_MARGIN" => 64,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 24,
				"NAME" => "Аренда жилья",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 46,
				"RIGHT_MARGIN" => 47,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 25,
				"NAME" => "Покупка мебели и предметов интерьера",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 48,
				"RIGHT_MARGIN" => 49,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 26,
				"NAME" => "Прачечная и химчистка",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 50,
				"RIGHT_MARGIN" => 51,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 27,
				"NAME" => "Прочие бытовые услуги",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 52,
				"RIGHT_MARGIN" => 53,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 28,
				"NAME" => "Ремонт недвижимости",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 54,
				"RIGHT_MARGIN" => 55,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 29,
				"NAME" => "Ремонт обуви",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 56,
				"RIGHT_MARGIN" => 57,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 30,
				"NAME" => "Уборка дома",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 58,
				"RIGHT_MARGIN" => 59,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 31,
				"NAME" => "Хоз. товары",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 60,
				"RIGHT_MARGIN" => 61,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 32,
				"NAME" => "Электроника и техника",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 23,
				"LEFT_MARGIN" => 62,
				"RIGHT_MARGIN" => 63,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 33,
				"NAME" => "Домашние животные",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 65,
				"RIGHT_MARGIN" => 72,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 34,
				"NAME" => "Ветеринар",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 33,
				"LEFT_MARGIN" => 66,
				"RIGHT_MARGIN" => 67,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 35,
				"NAME" => "Корм",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 33,
				"LEFT_MARGIN" => 68,
				"RIGHT_MARGIN" => 69,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 36,
				"NAME" => "Прочие расходы на животных",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 33,
				"LEFT_MARGIN" => 70,
				"RIGHT_MARGIN" => 71,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 37,
				"NAME" => "Досуг и отдых",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 73,
				"RIGHT_MARGIN" => 88,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 38,
				"NAME" => "Кино, видео, музыка, фото, игры",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 74,
				"RIGHT_MARGIN" => 75,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 39,
				"NAME" => "Книги, газеты и журналы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 76,
				"RIGHT_MARGIN" => 77,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 40,
				"NAME" => "Культурные события, театры, выставки",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 78,
				"RIGHT_MARGIN" => 79,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 41,
				"NAME" => "Отпуск",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 80,
				"RIGHT_MARGIN" => 81,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 42,
				"NAME" => "Развлечения",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 82,
				"RIGHT_MARGIN" => 83,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 43,
				"NAME" => "Рестораны, кафе, клубы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 84,
				"RIGHT_MARGIN" => 85,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 44,
				"NAME" => "Спортивные события и товары",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 37,
				"LEFT_MARGIN" => 86,
				"RIGHT_MARGIN" => 87,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 45,
				"NAME" => "Инвестиционный доход",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 89,
				"RIGHT_MARGIN" => 98,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 46,
				"NAME" => "Дивиденды",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 45,
				"LEFT_MARGIN" => 90,
				"RIGHT_MARGIN" => 91,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 47,
				"NAME" => "Доход от аренды имущества",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 45,
				"LEFT_MARGIN" => 92,
				"RIGHT_MARGIN" => 93,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 48,
				"NAME" => "Доход от прироста капитала",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 45,
				"LEFT_MARGIN" => 94,
				"RIGHT_MARGIN" => 95,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 49,
				"NAME" => "Проценты полученные",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 45,
				"LEFT_MARGIN" => 96,
				"RIGHT_MARGIN" => 97,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 50,
				"NAME" => "Инвестиционный расход",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 99,
				"RIGHT_MARGIN" => 102,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 51,
				"NAME" => "Потери от инвестиций",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 50,
				"LEFT_MARGIN" => 100,
				"RIGHT_MARGIN" => 101,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 52,
				"NAME" => "Коммунальные платежи",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 103,
				"RIGHT_MARGIN" => 110,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 53,
				"NAME" => "Квартплата",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 52,
				"LEFT_MARGIN" => 104,
				"RIGHT_MARGIN" => 105,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 54,
				"NAME" => "Консъержи и охрана",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 52,
				"LEFT_MARGIN" => 106,
				"RIGHT_MARGIN" => 107,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 55,
				"NAME" => "Электричество",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 52,
				"LEFT_MARGIN" => 108,
				"RIGHT_MARGIN" => 109,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 56,
				"NAME" => "Медицина",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 111,
				"RIGHT_MARGIN" => 120,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 57,
				"NAME" => "Лекарства",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 56,
				"LEFT_MARGIN" => 112,
				"RIGHT_MARGIN" => 113,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 58,
				"NAME" => "Стационар",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 56,
				"LEFT_MARGIN" => 114,
				"RIGHT_MARGIN" => 115,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 59,
				"NAME" => "Стоматология",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 56,
				"LEFT_MARGIN" => 116,
				"RIGHT_MARGIN" => 117,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 60,
				"NAME" => "Терапевт и другие врачи",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 56,
				"LEFT_MARGIN" => 118,
				"RIGHT_MARGIN" => 119,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 61,
				"NAME" => "Налоги, сборы и услуги",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 121,
				"RIGHT_MARGIN" => 134,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 62,
				"NAME" => "Другие налоги и сборы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 61,
				"LEFT_MARGIN" => 122,
				"RIGHT_MARGIN" => 123,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 63,
				"NAME" => "Консультационные услуги",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 61,
				"LEFT_MARGIN" => 124,
				"RIGHT_MARGIN" => 125,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 64,
				"NAME" => "Налог на имущество",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 61,
				"LEFT_MARGIN" => 126,
				"RIGHT_MARGIN" => 127,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 65,
				"NAME" => "Почтовые расходы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 61,
				"LEFT_MARGIN" => 128,
				"RIGHT_MARGIN" => 129,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 66,
				"NAME" => "Оформление документов",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 61,
				"LEFT_MARGIN" => 130,
				"RIGHT_MARGIN" => 131,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 67,
				"NAME" => "Членские взносы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 61,
				"LEFT_MARGIN" => 132,
				"RIGHT_MARGIN" => 133,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 68,
				"NAME" => "Не определена. Для доходов",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 135,
				"RIGHT_MARGIN" => 136,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 69,
				"NAME" => "Не определена. Для расходов",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 137,
				"RIGHT_MARGIN" => 138,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 70,
				"NAME" => "Образование",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 139,
				"RIGHT_MARGIN" => 146,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 71,
				"NAME" => "Книги и учебники",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 70,
				"LEFT_MARGIN" => 140,
				"RIGHT_MARGIN" => 141,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 72,
				"NAME" => "Обучение",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 70,
				"LEFT_MARGIN" => 142,
				"RIGHT_MARGIN" => 143,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 73,
				"NAME" => "Прочие образовательные расходы",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 70,
				"LEFT_MARGIN" => 144,
				"RIGHT_MARGIN" => 145,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 74,
				"NAME" => "Одежда, обувь, аксессуары",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 147,
				"RIGHT_MARGIN" => 154,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 75,
				"NAME" => "Аксессуары",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 74,
				"LEFT_MARGIN" => 148,
				"RIGHT_MARGIN" => 149,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 76,
				"NAME" => "Обувь",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 74,
				"LEFT_MARGIN" => 150,
				"RIGHT_MARGIN" => 151,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 77,
				"NAME" => "Одежда",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 74,
				"LEFT_MARGIN" => 152,
				"RIGHT_MARGIN" => 153,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 78,
				"NAME" => "Персональные доходы",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 155,
				"RIGHT_MARGIN" => 166,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 79,
				"NAME" => "Бонусы и премии",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 78,
				"LEFT_MARGIN" => 156,
				"RIGHT_MARGIN" => 157,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 80,
				"NAME" => "Доход предпринимателя",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 78,
				"LEFT_MARGIN" => 158,
				"RIGHT_MARGIN" => 159,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 81,
				"NAME" => "Заработная плата",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 78,
				"LEFT_MARGIN" => 160,
				"RIGHT_MARGIN" => 161,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 82,
				"NAME" => "Пенсия",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 78,
				"LEFT_MARGIN" => 162,
				"RIGHT_MARGIN" => 163,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 83,
				"NAME" => "Сверхурочное время",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 78,
				"LEFT_MARGIN" => 164,
				"RIGHT_MARGIN" => 165,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 84,
				"NAME" => "Питание",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 167,
				"RIGHT_MARGIN" => 172,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 85,
				"NAME" => "Питание вне дома",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 84,
				"LEFT_MARGIN" => 168,
				"RIGHT_MARGIN" => 169,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 86,
				"NAME" => "Питание дома",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 84,
				"LEFT_MARGIN" => 170,
				"RIGHT_MARGIN" => 171,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 87,
				"NAME" => "Подарки, материальная помощь",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 173,
				"RIGHT_MARGIN" => 174,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 88,
				"NAME" => "Проезд, транспорт",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 175,
				"RIGHT_MARGIN" => 182,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 89,
				"NAME" => "Авиа и ж/д билеты",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 88,
				"LEFT_MARGIN" => 176,
				"RIGHT_MARGIN" => 177,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 90,
				"NAME" => "Общественный транспорт",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 88,
				"LEFT_MARGIN" => 178,
				"RIGHT_MARGIN" => 179,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 91,
				"NAME" => "Такси",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 88,
				"LEFT_MARGIN" => 180,
				"RIGHT_MARGIN" => 181,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 92,
				"NAME" => "Проценты по кредитам и займам",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 183,
				"RIGHT_MARGIN" => 184,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 93,
				"NAME" => "Прочие доходы",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 185,
				"RIGHT_MARGIN" => 186,
				"SYSTEM" => true,
				"INCOME" => true
			),
			array(
				"ID" => 94,
				"NAME" => "Прочие личные расходы",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 187,
				"RIGHT_MARGIN" => 188,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 95,
				"NAME" => "Расходы по работе",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 189,
				"RIGHT_MARGIN" => 190,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 96,
				"NAME" => "Связь, ТВ и Интернет",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 191,
				"RIGHT_MARGIN" => 200,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 97,
				"NAME" => "Городской телефон",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 96,
				"LEFT_MARGIN" => 192,
				"RIGHT_MARGIN" => 193,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 98,
				"NAME" => "Мобильная связь",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 96,
				"LEFT_MARGIN" => 194,
				"RIGHT_MARGIN" => 195,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 99,
				"NAME" => "ТВ",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 96,
				"LEFT_MARGIN" => 196,
				"RIGHT_MARGIN" => 197,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 100,
				"NAME" => "Интернет",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 96,
				"LEFT_MARGIN" => 198,
				"RIGHT_MARGIN" => 199,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 101,
				"NAME" => "Страхование",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 201,
				"RIGHT_MARGIN" => 202,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 102,
				"NAME" => "Уход за собой",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 203,
				"RIGHT_MARGIN" => 210,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 103,
				"NAME" => "Салоны красоты и парикмахерские",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 102,
				"LEFT_MARGIN" => 204,
				"RIGHT_MARGIN" => 205,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 104,
				"NAME" => "Фитнес и йога",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 102,
				"LEFT_MARGIN" => 206,
				"RIGHT_MARGIN" => 207,
				"SYSTEM" => true,
				"INCOME" => false
			),
			array(
				"ID" => 105,
				"NAME" => "SPA, массаж и солярий",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 102,
				"LEFT_MARGIN" => 208,
				"RIGHT_MARGIN" => 209,
				"SYSTEM" => true,
				"INCOME" => false
			)
		);
	}
}