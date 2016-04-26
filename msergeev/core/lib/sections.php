<?php
//http://www.getinfo.ru/article610.html

namespace MSergeev\Core\Lib;

use MSergeev\Core\Entity\Query;

class Sections
{
	protected static $tableName = "ms_core_sections";
	protected static $selectFields = array('ID','ACTIVE','SORT','NAME','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL','PARENT_SECTION_ID');

	public static function getTableName()
	{
		return static::$tableName;
	}

	public static function getClassName()
	{
		static $className = Tools::getClassNameByTableName(static::$tableName);
		return $className;
	}

	public static function getSelectFields ()
	{
		return static::$selectFields;
	}

	public static function getTreeList ($bActive=false)
	{
		$className = static::getClassName();
		$arGetList = array(
			'select' => static::$selectFields,
			'order' => array('LEFT_MARGIN' => 'ASC')
		);
		if ($bActive)
		{
			$arGetList['filter'] = array('ACTIVE'=>true);
		}

		if ($arResult = $className::getList($arGetList))
		{
			return $arResult;
		}
		else
		{
			return false;
		}
	}

	public static function getInfo ($ID)
	{
		$className = static::getClassName();
		$arResult = $className::getList(array(
			'select' => static::$selectFields,
			'filter' => array('ID'=>intval($ID))
		));
		if ($arResult)
		{
			return $arResult[0];
		}
		else
		{
			return false;
		}
	}

	public static function getChild ($ID, $bActive=false)
	{
		$className = static::getClassName();
		$arSection = static::getInfo($ID);
		$arGetList = array(
			'select' => static::$selectFields,
			'filter' => array('>=LEFT_MARGIN'=>$arSection['LEFT_MARGIN'],'<=RIGHT_MARGIN'=>$arSection['RIGHT_MARGIN']),
			'order' => array('LEFT_MARGIN'=>'ASC')
		);
		if ($bActive)
		{
			$arGetList['filter'] = array_merge($arGetList['filter'], array('ACTIVE'=>true));
		}
		if ($arResult = $className::getList($arGetList))
		{
			return $arResult;
		}
		else
		{
			return false;
		}
	}

	public static function getParent ($ID, $bActive=false)
	{
		$className = static::getClassName();
		$arSection = static::getInfo($ID);
		$arGetList = array(
			'select' => static::$selectFields,
			'filter' => array('<=LEFT_MARGIN'=>$arSection['LEFT_MARGIN'],'>=RIGHT_MARGIN'=>$arSection['RIGHT_MARGIN']),
			'order' => array('LEFT_MARGIN'=>'ASC')
		);
		if ($bActive)
		{
			$arGetList['filter'] = array_merge($arGetList['filter'],array('ACTIVE'=>true));
		}
		if ($arResult = $className::getList($arGetList))
		{
			return $arResult;
		}
		else
		{
			return false;
		}
	}

	public static function getBranch ($ID, $bActive=false)
	{
		$className = static::getClassName();
		$arSection = static::getInfo($ID);
		$arGetList = array(
			'select' => static::$selectFields,
			'filter' => array('>RIGHT_MARGIN'=>$arSection['LEFT_MARGIN'],'<LEFT_MARGIN'=>$arSection['RIGHT_MARGIN']),
			'order' => array('LEFT_MARGIN'=>'ASC')
		);
		if ($bActive)
		{
			$arGetList['filter'] = array_merge($arGetList['filter'],array('ACTIVE'=>true));
		}
		if ($arResult = $className::getList($arGetList))
		{
			return $arResult;
		}
		else
		{
			return false;
		}
	}

	public static function getParentID ($ID)
	{
		$arSection = static::getInfo($ID);
		if (isset($arSection['PARENT_SECTION_ID']))
		{
			return $arSection['PARENT_SECTION_ID'];
		}
		else
		{
			return false;
		}
	}

	public static function getParentInfo ($ID)
	{
		if ($arSection = static::getInfo(static::getParentID($ID)))
		{
			return $arSection;
		}
		else
		{
			return false;
		}
	}

	public static function addSection ($arSection)
	{
		//Проверяем есть ли у раздела родительский раздел
		$helper = new SqlHelper();
		if (isset($arSection['PARENT_SECTION_ID']) && intval($arSection['PARENT_SECTION_ID'])>0)
		{
			$arParentSection = static::getInfo(intval($arSection['PARENT_SECTION_ID']));
			$RIGHT_KEY = $arParentSection['RIGHT_MARGIN'];
			$LEVEL = $arParentSection['DEPTH_LEVEL'];
		}
		else
		{
			$sql = "SELECT MAX(".$helper->wrapQuotes('RIGHT_MARGIN').") as MAX FROM ".$helper->wrapQuotes(static::getTableName());
			$query = new Query('select');
			$query->setQueryBuildParts($sql);
			$res = $query->exec();
			if ($ar_res = $res->fetch())
			{
				$RIGHT_KEY = $ar_res['MAX'] + 1;
				$LEVEL = 0;
			}
			else
			{
				$RIGHT_KEY = 1;
				$LEVEL = 0;
			}
		}
	}


	public static function checkTable ()
	{
		/* ОСНОВНЫЕ ПРАВИЛА ХРАНЕНИЯ ДЕРЕВА КАТАЛОГОВ
		 *
		 * 1. Левый ключ ВСЕГДА меньше правого;
		 * 2. Наименьший левый ключ ВСЕГДА равен 1;
		 * 3. Наибольший правый ключ ВСЕГДА равен двойному числу узлов;
		 * 4. Разница между правым и левым ключом ВСЕГДА нечетное число;
		 * 5. Если уровень узла нечетное число то тогда левый ключ ВСЕГДА нечетное число, то же самое и для четных чисел;
		 * 6. Ключи ВСЕГДА уникальны, вне зависимости от того правый он или левый;
		 */
		$bError = false;
		$className = static::getClassName();
		//TODO: Невозможно сравнивать с полем. Нужно доделать, чтобы можно было. См. коммент ниже
		/*
		$res1 = $className::getList(array(
			'select' => array('ID'),
			'filter' => array('LEFT_MARGIN'=>'RIGHT_MARGIN')
		));
		*/
		$helper = new SqlHelper();
		//1. Левый ключ ВСЕГДА меньше правого;
		//Если все правильно то результата работы запроса не будет, иначе, получаем список идентификаторов неправильных строк;
		$sql1 = "SELECT ".$helper->wrapQuotes('ID')." FROM ".$helper->wrapQuotes(static::getTableName())." WHERE "
			.$helper->wrapQuotes('LEFT_MARGIN')." >= ".$helper->wrapQuotes('RIGHT_MARGIN');
		$query1 = new Query('select');
		$query1->setQueryBuildParts($sql1);
		$res1 = $query1->exec();
		if ($res1->getResult())
		{
			while ($ar_res1 = $res1->fetch())
			{
				$arResult['RULE1'][] = $ar_res1;
			}
			$bError = true;
		}

		//2. Наименьший левый ключ ВСЕГДА равен 1;
		//3. Наибольший правый ключ ВСЕГДА равен двойному числу узлов;
		//Получаем количество записей (узлов), минимальный левый ключ и максимальный правый ключ, проверяем значения.
		$sql2 = "SELECT COUNT(".$helper->wrapQuotes('ID').") as COUNT, MIN(".$helper->wrapQuotes('LEFT_MARGIN')
			.") as MIN, MAX(".$helper->wrapQuotes('RIGHT_MARGIN').") as MAX FROM ".$helper->wrapQuotes(static::getTableName());
		$query2 = new Query('select');
		$query2->setQueryBuildParts($sql2);
		$res2 = $query2->exec();
		if ($ar_res2 = $res2->fetch())
		{
			if ($ar_res2['MIN'] != 1)
			{
				$bError = true;
				$arResult['RULE2']['MIN'] = $ar_res2['MIN'];
			}
			$double = $ar_res2['COUNT']*2;
			if ($ar_res2['MAX'] != $double)
			{
				$bError = true;
				$arResult['RULE3']['COUNT'] = $ar_res2['COUNT'];
				$arResult['RULE3']['DOUBLE'] = $double;
				$arResult['RULE3']['MAX'] = $ar_res2['MAX'];
			}
		}
		else
		{
			$bError = true;
			$arResult['RULE2'] = false;
			$arResult['RULE3'] = false;
		}

		//4. Разница между правым и левым ключом ВСЕГДА нечетное число;
		//Если все правильно то результата работы запроса не будет, иначе, получаем список идентификаторов неправильных строк;
		$sql4 = "SELECT ".$helper->wrapQuotes('ID').", MOD((".$helper->wrapQuotes('RIGHT_MARGIN')." - "
			.$helper->wrapQuotes('LEFT_MARGIN').") / 2) AS REMAINDER FROM ".$helper->wrapQuotes(static::getTableName())
			." WHERE REMAINDER = 0";
		$query4 = new Query('select');
		$query4->setQueryBuildParts($sql4);
		$res4 = $query4->exec();
		if ($res4->getResult())
		{
			$bError = true;
			while ($ar_res4 = $res4->fetch())
			{
				$arResult['RULE4'][] = $ar_res4;
			}
		}

		//5. Если уровень узла нечетное число то тогда левый ключ ВСЕГДА нечетное число, то же самое и для четных чисел;
		//Если все правильно то результата работы запроса не будет, иначе, получаем список идентификаторов неправильных строк;
		$sql5 = "SELECT ".$helper->wrapQuotes('ID').", MOD((".$helper->wrapQuotes('LEFT_MARGIN')." – "
			.$helper->wrapQuotes('DEPTH_LEVEL')." + 2) / 2) AS REMAINDER FROM "
			.$helper->wrapQuotes(static::getTableName())." WHERE REMAINDER = 1";
		$query5 = new Query('select');
		$query5->setQueryBuildParts($sql5);
		$res5 = $query5->exec();
		if ($res5->getResult())
		{
			$bError = true;
			while ($ar_res5 = $res5->fetch())
			{
				$arResult['RULE5'][] = $ar_res5;
			}
		}

		//6. Ключи ВСЕГДА уникальны, вне зависимости от того правый он или левый;
		/*
			Здесь, я думаю, потребуется некоторое пояснение запроса. Выборка по сути осуществляется из одной таблицы,
			но в разделе FROM эта таблица "виртуально" продублирована 3 раза: из первой мы выбираем все записи по
			порядку и начинаем сравнивать с записями второй таблицы (раздел WHERE) в результате мы получаем все записи
			неповторяющихся значений. Для того, что бы определить сколько раз запись не повторялась в таблице,
			производим группировку (раздел GROUP BY) и получаем число "не повторов" (COUNT(t1.id)). По условию,
			если все ключи уникальны, то число не повторов будет меньше на одну единицу чем общее количество записей.
			Для того, чтобы определить количество записей в таблице, берем максимальный правый ключ (MAX(t3.right_key)),
			так как его значение - двойное число записей, но так как в условии отбора для записи с максимальным правым
			ключом - максимальный правый ключ будет другим, вводится третья таблица, при этом число "неповторов"
			увеличивается умножением его на количество записей. SQRT(4*rep +1) - решение уравнения x^2 + x = rep.
			Если все правильно то результата работы запроса не будет, иначе, получаем список идентификаторов
			неправильных строк;
		 */
		$sql6 = "SELECT t1.".$helper->wrapQuotes('ID').", COUNT(t1.".$helper->wrapQuotes('ID').") AS rep, MAX(t3."
			.$helper->wrapQuotes('RIGHT_MARGIN').") AS max_right FROM ".$helper->wrapQuotes(static::getTableName())
			." AS t1, ".$helper->wrapQuotes(static::getTableName())." AS t2, "
			.$helper->wrapQuotes(static::getTableName())." AS t3 WHERE t1.".$helper->wrapQuotes('LEFT_MARGIN')
			." <> t2.".$helper->wrapQuotes('LEFT_MARGIN')." AND t1.".$helper->wrapQuotes('LEFT_MARGIN')
			." <> t2.".$helper->wrapQuotes('RIGHT_MARGIN')." AND t1.".$helper->wrapQuotes('RIGHT_MARGIN')
			." <> t2.".$helper->wrapQuotes('LEFT_MARGIN')." AND t1.".$helper->wrapQuotes('RIGHT_MARGIN')
			." <> t2.".$helper->wrapQuotes('RIGHT_MARGIN')." GROUP BY t1.".$helper->wrapQuotes('ID')
			." HAVING max_right <> SQRT(4 * rep + 1) + 1";
		$query6 = new Query('select');
		$query6->setQueryBuildParts($sql6);
		$res6 = $query6->exec();
		if ($res6->getResult())
		{
			$bError = true;
			while ($ar_res6 = $res6->fetch())
			{
				$arResult['RULE6'][] = $ar_res6;
			}
		}

		if ($bError)
		{
			return $arResult;
		}
		else
		{
			return false;
		}
	}
}