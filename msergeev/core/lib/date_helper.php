<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Core\Exception;

class DateHelper
{
	public function __construct ()
	{

	}

	public function convertDateFromDB ($date=null)
	{
		try
		{
			if (is_null($date))
			{
				throw new Exception\ArgumentNullException('date');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			die($e->showException());
		}

		list($year,$month,$day) = explode("-",$date);
		$time = mktime(0,0,0,intval($month),intval($day),intval($year));

		return date('d.m.Y',$time);
	}

	public function convertDateToDB ($date=null)
	{
		try
		{
			if (is_null($date))
			{
				throw new Exception\ArgumentNullException('date');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			die($e->showException());
		}

		list($day,$month,$year) = explode(".",$date);
		$time = mktime(0,0,0,intval($month),intval($day),intval($year));

		return date('Y-m-d',$time);
	}

	public function strToTime ($time=null, $str=null, $type=null)
	{
		if (is_null($type))
		{
			$type='site';
		}
		if (is_null($str))
		{
			$str = '+1 day';
		}
		if (is_null($time))
		{
			if ($type === 'site')
			{
				$time = date('d.m.Y');
			}
			elseif ($type === 'db')
			{
				$time = date('Y-m-d');
			}
			elseif ($type === 'time')
			{
				$time = time();
			}
		}

		if ($type === 'site')
		{
			list($day,$month,$year)=explode('.',$time);
			$time = mktime(0,0,0,intval($month),intval($day),intval($year));
			$time = strtotime($str,$time);
			return date('d.m.Y',$time);
		}
		elseif ($type === 'db')
		{
			list($year,$month,$day)=explode('-',$time);
			$time = mktime(0,0,0,intval($month),intval($day),intval($year));
			$time = strtotime($str,$time);
			return date('Y-m-d',$time);
		}
		elseif ($type === 'time')
		{
			return strtotime($str,$time);
		}
		else
		{
			return false;
		}

	}

	public function getDateTimestamp ($date=null)
	{
		try
		{
			if (is_null($date))
			{
				throw new Exception\ArgumentNullException('date');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			die($e->showException());
		}

		list($day,$month,$year) = explode(".",$date);

		return mktime(0,0,0,intval($month),intval($day),intval($year));
	}

}