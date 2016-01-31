<?php

namespace MSergeev\Core\Entity;
use MSergeev\Core\Exception;
use \MSergeev\Core\Lib;

class Query
{
	protected
		$type=null; //Тип Query (select|create|insert|update|delete|drop)

	protected
		$select = array(),
		$group = array(),
		$order = array(),
		$limit = null,
		$offset = null,
		$count_total = null,
		$runtime = null;

	protected
		$filter = array(),
		$where = array(),
		$having = array();

	protected
		$insertArray = array(),
		$updateArray = array(),
		$updatePrimary = null;

	protected
		$deletePrimary = null,
		$deleteConfirm = false;

	protected
		$tableLinks = array();

	protected
		$autoIncrement = 1;

	protected
		$filter_logic = "AND";

	protected $query_build_parts="";

	protected $table_name=null;
	protected $table_alias_postfix = '';
	protected $table_map=array();

	protected $primary_key=null;

	protected
		$join_map = array();

	/** @var array list of used joins */
	protected $join_registry;

	/** @var string Last executed SQL query */
	protected static $last_query;

	/** @var array Replaced field aliases */
	protected $replaced_aliases;

	/** @var array Replaced table aliases */
	protected $replaced_taliases;


	public function __construct($type)
	{
		$this->type = $type;
	}

	/**
	 * Устанавливет тип Query
	 *
	 * @param string $type
	 */
	public function setType ($type)
	{
		$this->type = $type;
	}

	/**
	 * Возвращает тип Query
	 *
	 * @return null|string $this->type
	 */
	public function getType ()
	{
		return $this->type;
	}

	/**
	 * Устанавливает значения SELECT
	 *
	 * @param string|array $select
	 */
	public function setSelect ($select)
	{
		if (!is_array($select))
			$this->select = array($select);
		else
			$this->select = $select;
	}

	/**
	 * Возвращает значение SELECT
	 *
	 * @return array $this->select
	 */
	public function getSelect ()
	{
		return $this->select;
	}

	/**
	 * Устанавливает название таблицы DB
	 *
	 * @param string $tableName
	 */
	public function setTableName ($tableName)
	{
		$this->table_name = $tableName;
	}

	/**
	 * Возвращает название таблицы DB
	 *
	 * @return null|string $this->table_name
	 */
	public function getTableName ()
	{
		return $this->table_name;
	}

	/**
	 * Устанавливает поле PRIMARY для таблицы
	 *
	 * @param string $key
	 */
	public function setPrimaryKey ($key)
	{
		$this->primary_key = $key;
	}

	/**
	 * Возвращает поле PRIMARY для таблицы
	 *
	 * @return null|string $this->primary_key
	 */
	public function getPrimaryKey ()
	{
		return $this->primary_key;
	}

	/**
	 * Устанавливет карту таблицы DB
	 *
	 * @param array $arMap
	 */
	public function setTableMap ($arMap)
	{
		$this->table_map = $arMap;
	}

	/**
	 * Возвращает карту таблицы DB
	 *
	 * @return array $this->table_map
	 */
	public function getTableMap ()
	{
		return $this->table_map;
	}

	public function setFilter ($filter)
	{
		if (!is_array($filter))
			$this->filter = array($filter);
		else
			$this->filter = $filter;
	}

	public function getFilter ()
	{
		return $this->filter;
	}

	public function setFilterLogic ($logic="AND")
	{
		if ($logic != "AND" && $logic != "OR") $logic="AND";
		$this->filter_logic = $logic;
	}

	public function getFilterLogic ()
	{
		return $this->filter_logic;
	}

	public function setWhere ($where=array())
	{
		if (empty($where))
			$this->where = $this->filter;
		else
			$this->where = $where;
	}

	public function getWhere ()
	{
		return $this->where;
	}

	public function setGroup ($group)
	{
		if (!is_array($group))
			$this->group = array($group);
		else
			$this->group = $group;
	}

	public function getGroup ()
	{
		return $this->group;
	}

	public function setOrder ($order, $by = "ASC")
	{
		if (!is_array($order))
		{
			$this->order = array($order => $by);
		}
		else
		{
			$arOrder = array();
			foreach ($order as $k => $v)
			{
				if (is_numeric($k)) {
					$arOrder[$v] = $by;
				}
				else
				{
					$arOrder[$k] = $v;
				}
			}
			$this->order = $arOrder;
		}
	}

	public function getOrder ()
	{
		return $this->order;
	}

	public function setLimit ($limit)
	{
		$this->limit = $limit;
	}

	public function getLimit ()
	{
		return $this->limit;
	}

	public function setOffset ($offset)
	{
		$this->offset = $offset;
	}

	public function getOffset ()
	{
		return $this->offset;
	}

	public function setRuntime ($runtime)
	{
		$this->runtime = $runtime;
	}

	public function getRuntime ()
	{
		return $this->runtime;
	}

	public function setQueryBuildParts ($sql)
	{
		$this->query_build_parts = $sql;
	}

	public function getQueryBuildParts ()
	{
		return $this->query_build_parts;
	}

	public function setInsertArray ($array)
	{
		$this->insertArray = $array;
	}

	public function getInsertArray ()
	{
		return $this->insertArray;
	}

	public function setAutoIncrement ($autoI)
	{
		$this->autoIncrement = $autoI;
	}

	public function getAutoIncrement ()
	{
		return $this->autoIncrement;
	}

	public function setTableAliasPostfix ($alias)
	{
		$this->table_alias_postfix = $alias;
	}

	public function getTableAliasPostfix ()
	{
		return $this->table_alias_postfix;
	}

	public function setUpdateArray($array)
	{
		$this->updateArray = $array;
	}

	public function getUpdateArray()
	{
		return $this->updateArray;
	}

	public function setUpdatePrimary ($primary)
	{
		$this->updatePrimary = $primary;
	}

	public function getUpdatePrimary ()
	{
		return $this->updatePrimary;
	}

	public function setDeletePrimary ($primary)
	{
		$this->deletePrimary = $primary;
	}

	public function getDeletePrimary ()
	{
		return $this->deletePrimary;
	}

	public function setDeleteConfirm ($confirm=false)
	{
		$this->deleteConfirm = $confirm;
	}

	public function getDeleteConfirm ()
	{
		return $this->deleteConfirm;
	}

	public function setTableLinks ($arLinks)
	{
		$this->tableLinks = $arLinks;
	}

	public function getTableLinks ()
	{
		return $this->tableLinks;
	}

	/**
	 * Выполняет SQL запрос Query
	 *
	 * @throw Exception\SqlQueryException
	 *
	 * @return Lib\DBResult $res
	 */
	public function exec ()
	{
		$this->setQueryBuildParts(static::BuildQuery());
		$DB = $GLOBALS['DB'];
		try
		{
			$res = $DB->query ($this);
			if (!$res->getResult ())
			{
				throw new Exception\SqlQueryException("Error ".$this->getType ()." query", $res->getResultErrorText (),
											$this->getQueryBuildParts ());
			}
			return $res;
		}
		catch (Exception\SqlQueryException $e)
		{
			echo $e->showException();
		}
	}

	protected function BuildQuery ()
	{
		if ($this->getType() == "select")
		{
			$sql = static::BuildQuerySelect();
		}
		elseif ($this->getType() == "create")
		{
			$sql = static::BuildQueryCreate ();
		}
		elseif ($this->getType() == "insert")
		{
			$sql = static::BuildQueryInsert();
		}
		elseif ($this->getType() == "update")
		{
			$sql = static::BuildQueryUpdate();
		}
		elseif ($this->getType() == "delete")
		{
			$sql = static::BuildQueryDelete();
		}
		else
		{
			$sql = "";
		}

		return $sql;
	}

	protected function BuildQuerySelect ()
	{
		$helper = new Lib\SqlHelper ();
		$quote = $helper->getQuote();

		$sql = "SELECT\n\t";
		$arSelect = $this->getSelect();
		if (empty($arSelect)) {
			$sql .= "*";
		}
		else
		{
			$sql .= $quote.join ($quote.",\n\t".$quote,$arSelect).$quote;
		}

		$sql .= "\nFROM\n\t".$helper->wrapQuotes($this->getTableName());
		if ($this->getTableAliasPostfix() != '') {
			$sql .= ' '.$this->getTableAliasPostfix()."\n";
		}
		else
		{
			$sql .= "\n";
		}

		$arWhere = $this->getWhere();
		if (!empty($arWhere))
		{
			$sql .= "WHERE\n\t";
			$arMap = $this->getTableMap();
			$bFirst = true;
			foreach ($arWhere as $field=>$value)
			{
				if (isset($arMap[$field]))
				{
					$value = $arMap[$field]->saveDataModification($value);
					$bEquating_str = false;

					if ($arMap[$field] instanceof IntegerField)
					{
						$equating = " = ";
					}
					elseif ($arMap[$field] instanceof BooleanField)
					{
						$equating = " LIKE ";
						$bEquating_str = true;
					}
					elseif ($arMap[$field] instanceof DateField)
					{
						$equating = " = ";
						$bEquating_str = true;
					}
					elseif ($arMap[$field] instanceof DatetimeField)
					{
						$equating = " = ";
						$bEquating_str = true;
					}
					elseif ($arMap[$field] instanceof EnumField)
					{
						$equating = " = ";
						//TODO: Доделать
					}
					elseif ($arMap[$field] instanceof ExpressionField)
					{
						$equating = " = ";
						//TODO: Доделать
					}
					elseif ($arMap[$field] instanceof FloatField)
					{
						$equating = " = ";
					}
					elseif ($arMap[$field] instanceof ReferenceField)
					{
						$equating = " = ";
						//TODO: Доделать
					}
					elseif ($arMap[$field] instanceof StringField)
					{
						$equating = " LIKE ";
						$bEquating_str = true;
					}
					elseif ($arMap[$field] instanceof TextField)
					{
						$equating = " LIKE ";
						$bEquating_str = true;
					}

					if ($bFirst)
					{
						$sql .= $helper->wrapQuotes($field).$equating;
						if ($bEquating_str)
							$sql .= "'".$value."'";
						else
							$sql .= $value;
						$bFirst = false;
					}
					else
					{
						$sql .= ' '.$this->getFilterLogic()."\n\t".$helper->wrapQuotes($field).$equating;
						if ($bEquating_str)
							$sql .= "'".$value."'";
						else
							$sql .= $value;
					}
				}
			}
		}
		$arGroup = $this->getGroup();
		if (!empty($arGroup)) {
			//TODO: Доделать
			$sql .= "\nGROUP BY\n\t";
			$bFirst = true;
			foreach ($arGroup as $groupField=>$sort)
			{
				if($bFirst)
				{
					$bFirst = false;
					$sql .= $helper->wrapQuotes($groupField).' '.$sort;
				}
				else
				{
					$sql .= ",\n\t".$helper->wrapQuotes($groupField).' '.$sort;
				}
			}
		}
		$arOrder = $this->getOrder();
		if (!empty($arOrder)) {
			$sql .= "\nORDER BY\n\t";
			$bFirst = true;
			foreach ($arOrder as $sort=>$by)
			{
				if ($bFirst)
				{
					$sql .= $helper->wrapQuotes($sort).' '.$by;
					$bFirst = false;
				}
				else
				{
					$sql .= ",\n\t".$helper->wrapQuotes($sort).' '.$by;
				}
			}
		}

		if (!is_null($this->getLimit()))
		{
			$sql .= "\nLIMIT ";
			if (!is_null($this->getOffset()))
				$sql .= $this->getOffset();
			else
				$sql .= 0;
			$sql .= ', '.$this->getLimit();
		}

		if (!is_null($this->getRuntime()))
		{
			//TODO: Доделать
		}

		return $sql;
	}

	/**
	 *
	 * @throw Exception\ArgumentNullException
	 *
	 * @return string $sql
	 */
	protected function BuildQueryCreate ()
	{
		$helper = new Lib\SqlHelper();
		$arMap = $this->getTableMap();

		$primaryField="";
		$sql = "CREATE TABLE IF NOT EXISTS ".$this->getTableName()." (\n\t";
		foreach ($arMap as $fields=>$objData) {
			//var_dump ($objData);
			if ($objData->isPrimary()) $primaryField = $objData->getColumnName();
			$field = $objData->getColumnName();
			$sql .= $helper->wrapQuotes($field)." ".$objData->getDataType();
			switch ($objData->getDataType()) {
				case "int":
					$sql .= "(".$objData->getSize().") ";
					break;
				case "varchar":
					$sql .= "(".$objData->getSize().") ";
					break;
				default:
					$sql .= " ";
					break;
			}
			if ($objData->isPrimary() || $objData->isRequired()) {
				$sql .= "NOT NULL ";
				if ($objData instanceof BooleanField) {
					try {
						if (!is_null($objData->getDefaultValueDB())) {
							$sql .= "DEFAULT '".$objData->getDefaultValueDB()."' ";
						}
						else
						{
							throw new Exception\ArgumentNullException($objData->getColumnName());
						}
					}
					catch (Exception\ArgumentNullException $e)
					{
						$e->showException();
					}
				}
				elseif ($objData instanceof DateField)
				{
					if (!is_null($objData->getDefaultValue())) {
						$sql .= "DEFAULT '".$objData->getDefaultValue()."' ";
					}
					else
					{
						$sql .= "DEFAULT ".$helper->helperDate()->getGetDateFunction()." ";
					}
				}
				else {
					try
					{
						if (!is_null($objData->getDefaultValue())) {
							$sql .= "DEFAULT '".$objData->getDefaultValue()."' ";
						}
						else
						{
							throw new Exception\ArgumentNullException($objData->getColumnName());
						}
					}
					catch (Exception\ArgumentNullException $e)
					{
						$e->showException();
					}
				}
			}
			else {
				if ($objData instanceof BooleanField) {
					if (!is_null($objData->getDefaultValueDB())) {
						$sql .= "DEFAULT '".$objData->getDefaultValueDB()."' ";
					}
					else {
						$sql .= "DEFAULT NULL ";
					}
				}
				else {
					if (!is_null($objData->getDefaultValue())) {
						$sql .= "DEFAULT '".$objData->getDefaultValue()."' ";
					}
					else {
						$sql .= "DEFAULT NULL ";
					}
				}
			}
			if ($objData->isAutocomplete()) {
				$sql .= "AUTO_INCREMENT ";
			}
			if (!is_null($objData->getTitle())) {
				$sql .= "COMMENT '".$objData->getTitle()."',\n\t";
			}
		}
		if ($primaryField != "") $sql .= "PRIMARY KEY (".$helper->wrapQuotes($primaryField).")\n";
		$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=".$this->getAutoIncrement()." ;";

		return $sql;
	}

	protected function BuildQueryInsert ()
	{
		$helper = new Lib\SqlHelper ();

		$arDefaultValues = $this->getInsertArray();
		$tableName = $this->getTableName();
		$arMapArray = $this->getTableMap();
		$sql = "";

		$bFFirts = true;

		$sql .= "INSERT INTO ".$helper->wrapQuotes($tableName)." ";
		foreach ($arDefaultValues as $arValue)
		{
			$sqlNames = "(";
			$sqlValues = "(";
			$bFirst = true;
			foreach ($arMapArray as $field => $obMap)
			{
				$columnName = $obMap->getColumnName();
				$fieldName = $obMap->getName();
				if ($bFirst)
				{
					$bFirst = false;
				}
				else
				{
					$sqlValues .= ", ";
					$sqlNames .= ", ";
				}
				if (isset($arValue[$fieldName]))
				{
					if (
						$obMap instanceof IntegerField
						|| $obMap instanceof FloatField
					)
					{
						$arValue[$fieldName] = $obMap->saveDataModification($arValue[$fieldName]);
						//$sqlValues .= $arValue[$fieldName];
						$sqlValues .= "'".$arValue[$fieldName]."'";
						$sqlNames .= $helper->wrapQuotes($columnName);
					}
					else
					{
						$arValue[$fieldName] = $obMap->saveDataModification($arValue[$fieldName]);
						$sqlValues .= "'".$arValue[$fieldName]."'";
						$sqlNames .= $helper->wrapQuotes($columnName);
					}
				}
				else
				{
					if ($obMap->isAutocomplete())
					{
						$sqlValues .= 'NULL';
						$sqlNames .= $helper->wrapQuotes($columnName);
					}
					elseif (!$obMap->isRequired())
					{
						$sqlValues .= 'NULL';
						$sqlNames .= $helper->wrapQuotes($columnName);
					}
					elseif (!is_null($obMap->getRun()))
					{
						$arRun = $obMap->getRun();
						if (!isset($arRun['function']))
						{
							return false;
						}
						if (isset($arRun['column']))
						{
							if (!isset($arValue[$arRun['column']]))
							{
								return false;
							}
							else
							{
								if (is_callable($arRun['function']))
								{
									$res = call_user_func($arRun['function'],$arValue[$arRun['column']]);
									if (
										$obMap instanceof IntegerField
										|| $obMap instanceof FloatField
									)
									{
										$sql .= $res;
									}
									else
									{
										$sql .= "'".$res."'";
									}
								}
							}
						}
					}
					elseif (!is_null($obMap->getDefaultValue()))
					{
						$value = $obMap->getDefaultValue();
						$value = $obMap->saveDataModification($value);
						if (
							$obMap instanceof IntegerField
							|| $obMap instanceof FloatField
						)
						{
							//$sqlValues .= $value;
							$sqlValues .= "'".$value."'";
							$sqlNames .= $helper->wrapQuotes($columnName);
						}
						else
						{
							$sqlValues .= "'".$value."'";
							$sqlNames .= $helper->wrapQuotes($columnName);
						}
					}
					else
					{
						return false;
					}
				}
			}
			$sqlNames .= ")";
			$sqlValues .= ")";
			if ($bFFirts)
			{
				$bFFirts = false;
				$sql .= $sqlNames."\nVALUES\n ".$sqlValues;
			}
			else
			{
				$sql .= ",\n".$sqlValues;
			}
		}
		//msDebug($sql);

		return $sql;

	}

	protected function BuildQueryUpdate ()
	{
		$helper = new Lib\SqlHelper();
		$arMap = $this->getTableMap();
		$arUpdate = $this->getUpdateArray();
		$primaryId = $this->getUpdatePrimary();

		$sql = "UPDATE \n\t".$helper->wrapQuotes($this->getTableName())."\nSET\n";
		foreach ($arMap as $field=>$objData)
		{
			if ($objData->isPrimary())
			{
				$primaryField = $objData->getColumnName();
				$primaryObj = $objData;
				break;
			}
		}
		$bFirst = true;
		foreach ($arUpdate as $field=>$value)
		{
			if (isset($arMap[$field]))
			{
				$columnName = $arMap[$field]->getColumnName();
				if ($bFirst)
				{
					$bFirst = false;
				}
				else
				{
					$sql .= ",\n";
				}
				$sql .= "\t".$helper->wrapQuotes($columnName)." = '";

				$value = $arMap[$field]->saveDataModification($value);
				$sql .= $value;

				$sql .= "'";
			}

		}
		$sql .= "\nWHERE\n\t".$helper->wrapQuotes($this->getTableName());
		$sql .= ".".$helper->wrapQuotes($primaryField)." =";
		if ($primaryObj instanceof IntegerField || $primaryObj instanceof FloatField)
		{
			$sql .= $primaryId;
		}
		else
		{
			$sql .= "'".$primaryId."'";
		}
		$sql .= "\nLIMIT 1 ;";


		return $sql;
	}

	protected function BuildQueryDelete ()
	{
		$helper = new Lib\SqlHelper();
		$arMap = $this->getTableMap();
		$primaryId = $this->getDeletePrimary();
		$confirm = $this->getDeleteConfirm();
		$arTableLinks = $this->getTableLinks();

		foreach ($arMap as $field=>$objData)
		{
			if ($objData->isPrimary())
			{
				$primaryField = $objData->getColumnName();
				$primaryObj = $objData;
				break;
			}
		}
		$sql = "DELETE FROM ".$helper->wrapQuotes($this->getTableName());
		$sql .= " WHERE ".$helper->wrapQuotes($this->getTableName()).".";
		$sql .= $helper->wrapQuotes($primaryField)." = ";
		if ($primaryObj instanceof IntegerField || $primaryObj instanceof FloatField)
		{
			$sql .= $primaryId;
		}
		else
		{
			$sql .= "'".$primaryId."'";
		}
		$sql .= " LIMIT 1";

		if (empty($arTableLinks))
		{
			return $sql;
		}
		elseif ($confirm)
		{
			$sql .= static::getSqlMassDelete();
			//return $sql;
		}
		else
		{
			//TODO: Это надо продумать и переделать нормально
			$arPrimary = array(
				"ID" => $primaryId,
				"FIELD" => $primaryField,
				"OBJ" => $primaryObj
			);
			$bCanDelete = static::checkCanDelete($this,$arPrimary);

			if ($bCanDelete)
			{
				return $sql;
			}
			else
			{
				return false;
			}
		}
	}

	protected function getSqlMassDelete ()
	{
		$sql = "";

		return $sql;
	}

	protected function checkCanDelete($query,$arPrimary)
	{
		$bCanDelete = true;
		$arTableLinks = $query->getTableLinks();

		foreach ($arTableLinks as $field=>$arLinks)
		{
			if ($field == $arPrimary["FIELD"])
			{
				$searchValue = $arPrimary{"ID"};
			}
			else
			{
				$searchQuery = new Query("select");
				$searchQuery->setTableName($query->getTableName());
				$searchQuery->setTableMap(Lib\Tools::runTableClassFunction($query->getTableName(),"getMapArray()"));
				$searchQuery->setFilter(array(
					0 => array(
						$arPrimary["FIELD"] => $arPrimary["ID"]
					)
				));
				$searchQuery->setLimit(1);
				$res = $searchQuery->exec();
				if ($ar_res = $res->fetch())
				{
					$searchValue = $ar_res[$field];
				}

			}

			foreach ($arLinks as $link)
			{
				list($linkTable,$linkField) = explode(".",$link);
				$newQuery = new Query("select");
				$newQuery->setTableName($linkTable);
				$newQuery->setTableMap(Lib\Tools::runTableClassFunction($linkTable,"getMapArray()"));
				$newQuery->setFilter(array(
					0 => array(
						$linkField => $searchValue
					)
				));
				$newQuery->setLimit(1);
				$res = $newQuery->exec();
				if ($ar_res = $res->fetch())
				{
					$bCanDelete = false;
				}
			}
		}

		return $bCanDelete;
	}
}