<?php

namespace MSergeev\Core\Lib;

class SqlHelper
{
	const QUOTES = '`';

	public function __construct ()
	{

	}

	public function helperDate ()
	{
		return new SqlHelperDate();
	}

	public function helperMath ()
	{
		return new SqlHelperMath();
	}

	public function helperStr()
	{
		return new SqlHelperStr();
	}

	public function wrapQuotes ($str)
	{
		return self::QUOTES.$str.self::QUOTES;
	}
	public function getQuote ()
	{
		return self::QUOTES;
	}

	public function getCountFunction ($params="*")
	{
		return 'COUNT('.$params.')';
	}

	public function getMaxFunction ($column="")
	{
		if ($column=="") return "";

		return 'MAX('.$this->wrapQuotes($column).')';
	}

	public function getMinFunction ($column="")
	{
		if ($column=="") return "";

		return 'MIN('.$this->wrapQuotes($column).')';
	}

	public function getSumFunction ($column="")
	{
		if ($column=="") return "";

		return 'SUM('.$this->wrapQuotes($column).')';
	}

}