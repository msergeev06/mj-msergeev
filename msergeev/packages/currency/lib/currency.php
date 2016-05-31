<?php

namespace MSergeev\Packages\Currency\Lib;

use MSergeev\Core\Entity\Query;
use MSergeev\Core\Exception;
use MSergeev\Packages\Currency\Tables;
use MSergeev\Core\Lib\DateHelper;

class Currency
{
	/**
	 * Функция получает с курсы валют по отношению к базовой на указанную дату или на сегодня
	 *
	 * @param   string  $baseCur    Базовая валюта
	 * @param   array   $arRateCur  Массив валют курсов
	 * @param   string  $date       Дата
	 *
	 * @return  bool
	 */
	public static function getRates ($baseCur=null, $arRateCur=null, $date=null)
	{
		try
		{
			if (is_null($baseCur))
			{
				throw new Exception\ArgumentNullException('$baseCur');
			}
			if (is_null($arRateCur))
			{
				throw new Exception\ArgumentNullException('$arRateCur');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		if (is_null($date))
		{
			$date = date("d.m.Y");
		}

		$baseCur = strtoupper($baseCur);
		if (!is_array($arRateCur))
		{
			$arRateCur = array(strtoupper($arRateCur));
		}
		else
		{
			foreach ($arRateCur as &$rate)
			{
				$rate = strtoupper($rate);
			}
		}

		$arInsert = array();
		$i=0;
		if ($baseCur == "RUB")
		{
			//Если базовой валютой является рубль, загружаем данные с CBR.Ru (Сбербанк России)
			$date_cbr = str_replace('.','/',$date);
			$path = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$date_cbr;
			$rates = simplexml_load_file ($path);
			foreach ($rates->Valute as $val)
			{
				if (in_array(strval($val->CharCode),$arRateCur))
				{
					$res = Tables\RatesTable::getList(array(
						"filter" => array(
							"DATE" => $date,
							"CURRENCY_CURRENT" => strval($val->CharCode),
							"CURRENCY_BASE" => $baseCur
						)
					));
					if (!$res)
					{
						$arInsert[$i] = array(
							'DATE' => $date,
							'CURRENCY_CURRENT' => strval($val->CharCode),
							'CURRENCY_BASE' => $baseCur,
							'RATE' => floatval(str_replace(",",".",$val->Value))
						);
						$i++;
					}
				}
			}

			if (!empty($arInsert))
			{
				$query = new Query("insert");
				$query->setInsertParams(
					$arInsert,
					Tables\RatesTable::getTableName(),
					Tables\RatesTable::getMapArray()
				);
				$res = $query->exec();
			}
		}

	}

	/**
	 * Функция возвращает курс для указанной пары валют на указанную дату или на сегодня
	 *
	 *
	 * @param   string  $baseCur    Базовая валюта
	 * @param   string  $rateCur    Валюта курса
	 * @param   string  $date       Дата
	 *
	 * @return bool|array
	 */
	public static function getCurrencyRate ($baseCur=null, $rateCur=null, $date=null)
	{
		try
		{
			if (is_null($baseCur))
			{
				throw new Exception\ArgumentNullException('$baseCur');
			}
			if (is_null($rateCur))
			{
				throw new Exception\ArgumentNullException('$rateCur');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}
		if (is_null($date))
		{
			$date = date("d.m.Y");
		}
		$baseCur = strtoupper($baseCur);
		$rateCur = strtoupper($rateCur);

		$res = Tables\RatesTable::getList(array(
			"select" => "RATE",
			"filter" => array(
				"<=DATE" => $date,
				"CURRENCY_CURRENT" => $rateCur,
				"CURRENCY_BASE" => $baseCur
			)
		));
		if ($res)
		{
			return floatval($res[0]["RATE"]);
		}
		else
		{
			return false;
		}
	}


	public static function convertCurrency ($value=null,$fromCur=null,$toCur=null,$date=null)
	{
		try
		{
			if (is_null($value))
			{
				throw new Exception\ArgumentNullException('$value');
			}
			if (is_null($fromCur))
			{
				throw new Exception\ArgumentNullException('$fromCur');
			}
			if (is_null($toCur))
			{
				throw new Exception\ArgumentNullException('$toCur');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}
		if (floatval($value)==0)
		{
			return 0;
		}
		$fromCur = strtoupper($fromCur);
		$toCur = strtoupper($toCur);
		if (is_null($date) || !DateHelper::checkDate($date))
		{
			$date = date("d.m.Y");
		}

		$res = Tables\CurrencyTable::getList(array(
			"select" => "RATING",
			"filter" => array(
				"CODE" => $fromCur
			)
		));
		if ($res)
		{
			$rating = $res[0]["RATING"];
		}
		else
		{
			$rating = 1;
		}

		$newValue = $value * (self::getCurrencyRate($toCur,$fromCur,$date)/$rating);

		return floatval(round($newValue,4));
	}
}