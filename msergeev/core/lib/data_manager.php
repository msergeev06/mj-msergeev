<?php

namespace MSergeev\Core\Lib;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataBase;

class DataManager {

	const EVENT_ON_BEFORE_ADD = "OnBeforeAdd";
	const EVENT_ON_ADD = "OnAdd";
	const EVENT_ON_AFTER_ADD = "OnAfterAdd";
	const EVENT_ON_BEFORE_UPDATE = "OnBeforeUpdate";
	const EVENT_ON_UPDATE = "OnUpdate";
	const EVENT_ON_AFTER_UPDATE = "OnAfterUpdate";
	const EVENT_ON_BEFORE_DELETE = "OnBeforeDelete";
	const EVENT_ON_DELETE = "OnDelete";
	const EVENT_ON_AFTER_DELETE = "OnAfterDelete";

	public static function getClassName ()
	{
		return __CLASS__;
	}

	/**
	 * getTableName
	 *
	 * @return null|string
	 */
	public static function getTableName()
	{
		return null;
	}

	/**
	 * getTableTitle
	 *
	 * @return null|string
	 */
	public static function getTableTitle()
	{
		return null;
	}

	/**
	 * getMap
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array();
	}

    public static function getMapArray()
    {
        $arMap = static::getMap();
        $arMapArray = array();
        foreach ($arMap as $id=>$field)
        {
            $name = $field->getColumnName();
            $arMapArray[$name] = $field;
        }

        return $arMapArray;
    }

	/**
	 * getArrayDefaultValues
	 *
	 * @return array
	 */
	public static function getArrayDefaultValues () {
		return array();
	}

	public static function getTableLinks () {
		return array();
	}

	public static function add ($parameters)
	{
		$arMapArray = static::getMapArray();
		$arInsertValues = $parameters["VALUES"];
		$tableName = static::getTableName();
		$query = static::query("insert");
		$query->setTableName($tableName);
		$query->setTableMap($arMapArray);
		$query->setInsertArray($arInsertValues);
		$res = $query->exec();

		return $res;
	}

	public static function update ($primary, $parameters)
	{
		$arMapArray = static::getMapArray();
		$arUpdateValues = $parameters["VALUES"];
		$tableName = static::getTableName();
		$query = static::query("update");
		$query->setTableName($tableName);
		$query->setTableMap($arMapArray);
		$query->setUpdateArray($arUpdateValues);
		$query->setUpdatePrimary($primary);
		$query->exec();

	}

	public static function delete ($primary,$confirm=false)
	{
		$arMapArray = static::getMapArray();
		$tableName = static::getTableName();
		$arLinks = static::getTableLinks();
		$query = static::query("delete");
		$query->setTableName($tableName);
		$query->setTableMap($arMapArray);
		$query->setDeletePrimary($primary);
		$query->setDeleteConfirm($confirm);
		$query->setTableLinks($arLinks);
		$query->exec();
	}

	public static function getByPrimary ($primary, array $parameters = array())
	{
		static::normalizePrimary($primary);

	}

	public static function getById($id)
	{
		return static::getByPrimary($id);
	}

	public static function getPrimaryField ()
	{
		$arMap = static::getMap();
		foreach ($arMap as $field)
		{
			$columnName = $field->getColumnName();
			if ($field->isPrimary()) {
				return $columnName;
			}
		}
	}

	public static function getTableFields()
	{
		$arMap = static::getMap();
		$arTableFields = array();
		foreach ($arMap as $field)
		{
			$arTableFields[] = $field->getColumnName();
		}
		return $arTableFields;
	}

	public static function getList ($parameters)
	{
		$query = static::query("select");

		$arMap = static::getMapArray();
		$query->setTableMap($arMap);

		$tableName = static::getTableName();
		$query->setTableName($tableName);

		$primaryField = static::getPrimaryField();
		$query->setPrimaryKey($primaryField);

		foreach ($parameters as $field=>$values)
		{
			switch ($field)
			{
				case 'select':
					$query->setSelect($values);
					break;
				case 'filter':
					$query->setFilter($values);
					$query->setWhere();
					break;
				case 'group':
					$query->setGroup($values);
					break;
				case 'order':
					$query->setOrder($values);
					break;
				case 'limit':
					$query->setLimit($values);
					break;
				case 'offset':
					$query->setOffset($values);
					break;
				case 'runtime':
					$query->setRuntime($values);
					break;
			}
		}
		$arOrder = $query->getOrder();
		if (empty($arOrder))
		{
			$arOrder = array($primaryField => "ASC");
			$query->setOrder($arOrder);
		}

		$res = $query->exec($arMap);
		$arResult = array();
		while ($ar_res = $res->fetch())
		{
			$arResult[] = $ar_res;
		}

		if (!empty($arResult))
		{
			$tmpResult = $arResult;
			$arResult = array();
			for ($i=0; $i<count($tmpResult); $i++)
			{
				foreach ($tmpResult[$i] as $field=>$value)
				{
					if(!is_numeric($field))
					{
						$arResult[$i][$field] = $value;
					}
				}
			}

			if (!empty($arResult))
				return $arResult;
			else
				return false;
		}
		else
			return false;

	}

	public static function query ($type)
	{
		return new Entity\Query($type);
	}

	public static function insertDefaultRows ()
	{
		$arMapArray = static::getMapArray();
		$arDefaultValues = static::getArrayDefaultValues();
		if (count($arDefaultValues)>0)
		{
			$tableName = static::getTableName();
			$query = static::query("insert");
			$query->setTableName($tableName);
			$query->setTableMap($arMapArray);
			$query->setInsertArray($arDefaultValues);
			$res = $query->exec();

			return $res;
		}
		else {
			return false;
		}
	}

	public static function createTable ()
	{
		$arMap = static::getMapArray();
		$tableName = static::getTableName();
		$AUTO_INCREMENT = count(static::getArrayDefaultValues())+1;
		$query = static::query("create");
		$query->setTableName($tableName);
		$query->setTableMap($arMap);
		$query->setAutoIncrement($AUTO_INCREMENT);
		$res = $query->exec();

		return $res;
	}

	/*
	public static function installTable ()
	{
		$resCreate = static::createTable();
		$resInsert = static::insertDefaultRows();

		return ($resCreate && $resInsert);
	}
	*/

	protected static function normalizePrimary (&$primary)
	{
		$prim = '';
		if (!is_array($primary)) {
			$arMap = static::getMap();
			foreach ($arMap as $field=>$array) {
				if (isset($array["primary"])) {
					$prim = $field;
				}
			}
			if ($prim == '') $prim = 'ID';
			$primary = array('='.$prim => $primary);
		}
	}
}