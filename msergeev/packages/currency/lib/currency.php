<?php

namespace MSergeev\Packages\Currency\Lib;

use MSergeev\Core\Exception;
use MSergeev\Packages\Currency\Tables;
use MSergeev\Core\Lib\DateHelper;

class Currency
{
	/**
	 * Функция загружает с CBR.Ru все доступные валюты, и обновляет базу валют
	 *
	 * @return bool
	 */
	public static function getCurrencyFromCbr ()
	{
		return false;
	}

	/**
	 * Функция загружает с CBR.Ru все возможные валютные пары для указанных валют
	 *
	 * @param   string          $baseCur    Базовая
	 * @param   string|array    $arRateCur  Прочие валюты
	 *
	 * @return bool
	 */
	public static function getPairsFromCbr ($baseCur=null, $arRateCur=null)
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

		return array('BUY'=>0,'CELL'=>0);
	}

	/**
	 * Функция получает с Cbr курсы валют по отношению к базовой на указанную дату или на сегодня
	 *
	 * @param   string  $baseCur    Базовая валюта
	 * @param   array   $arRateCur  Массив валют курсов
	 * @param   string  $date       Дата
	 *
	 * @return  bool
	 */
	public static function getCbrRates ($baseCur=null, $arRateCur=null, $date=null)
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

		$arRate = self::getCurrencyRate($fromCur,$toCur,$date);

	}
}