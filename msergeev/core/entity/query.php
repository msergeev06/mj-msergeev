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
		if ($this->getQueryBuildParts() == '')
		{
			$this->setQueryBuildParts(static::BuildQuery());
		}
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
		try
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
				throw new Exception\ArgumentOutOfRangeException('queryType');
			}
		}
		catch (Exception\ArgumentOutOfRangeException $e)
		{
			die($e->showException());
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
			$bSelectFirst = true;
			foreach ($arSelect as $key=>$value)
			{
				if ($bSelectFirst)
				{
					$bSelectFirst = false;
				}
				else
				{
					$sql .= ",\n\t";
				}
				if (is_numeric($key))
				{
					$sql .= $helper->wrapQuotes($value);
				}
				else
				{
					$sql .= $helper->wrapQuotes($key)." AS ".$helper->wrapQuotes($value);
				}
			}
			//$sql .= $quote.join ($quote.",\n\t".$quote,$arSelect).$quote;
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
				if ($arMask = $this->maskField($field))
				{
					$field = $arMask['field'];
					if (isset($arMask['mask']))
					{
						$mask = $arMask['mask'];
					}
				}
				try
				{
					if (!isset($arMap[$field]))
					{
						throw new Exception\ArgumentOutOfRangeException('arMap['.$field.']');
					}
					else
					{
						$value = $arMap[$field]->saveDataModification($value);
						$bEquating_str = false;

						if ($arMap[$field] instanceof IntegerField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
						}
						elseif ($arMap[$field] instanceof BooleanField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " LIKE ";
							}
							$bEquating_str = true;
						}
						elseif ($arMap[$field] instanceof DateField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
							$bEquating_str = true;
						}
						elseif ($arMap[$field] instanceof DatetimeField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
							$bEquating_str = true;
						}
						elseif ($arMap[$field] instanceof EnumField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
							//TODO: Доделать
						}
						elseif ($arMap[$field] instanceof ExpressionField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
							//TODO: Доделать
						}
						elseif ($arMap[$field] instanceof FloatField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
						}
						elseif ($arMap[$field] instanceof ReferenceField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " = ";
							}
							//TODO: Доделать
						}
						elseif ($arMap[$field] instanceof StringField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " LIKE ";
							}
							$bEquating_str = true;
						}
						elseif ($arMap[$field] instanceof TextField)
						{
							if (isset($mask))
							{
								$equating = ' '.$mask.' ';
							}
							else
							{
								$equating = " LIKE ";
							}
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
				catch (Exception\ArgumentOutOfRangeException $e)
				{
					$e->showException();
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
						//$sql .= "DEFAULT ".$helper->helperDate()->getGetDateFunction()." ";
						$sql .= "";
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
		//msDebug($arDefaultValues);
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
										$sqlValues .= $res;
										$sqlNames .= $helper->wrapQuotes($columnName);
										//$sql .= $res;
									}
									else
									{
										$sqlValues .= "'".$res."'";
										$sqlNames .= $helper->wrapQuotes($columnName);
										//$sql .= "'".$res."'";
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
				try
				{
					if (is_null($primaryId) && intval($arUpdate[$primaryField]) > 0)
					{
						$primaryId = intval($arUpdate[$primaryField]);
					}
					elseif (is_null($primaryId))
					{
						throw new Exception\ArgumentNullException("primaryID");
					}
				}
				catch (Exception\ArgumentNullException $e)
				{
					die($e->showException());
				}
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
			static::sqlMassDelete($this);
			return false;
		}
		else
		{
			$bCanDelete = static::checkCanDelete($this);

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

	//TODO: Протестировать
	protected function sqlMassDelete ($query=null)
	{
		try
		{
			if (is_null($query))
			{
				throw new Exception\ArgumentNullException('query');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		$helper = new Lib\SqlHelper();
		$arMap = $query->getTableMap();
		$primaryId = $query->getDeletePrimary();
		$arTableLinks = $query->getTableLinks();
		$tableName = $query->getTableName();

		foreach ($arTableLinks as $field=>$arLinked)
		{
			foreach ($arLinked as $linkTable=>$linkField)
			{
				if (is_array($linkField))
				{
					foreach ($linkField as $linkF)
					{
						$arRes = Lib\Tools::runTableClassFunction ($linkTable,'getListFunc',array(
							array(
								'select' => array('ID'),
								'filter' => array(
									$linkF => $primaryId
								)
							)
						));
						if ($arRes)
						{
							foreach ($arRes as $delID)
							{
								$deleteQuery = new Query('delete');
								$deleteQuery->setDeletePrimary($delID);
								$deleteQuery->setTableLinks(Lib\Tools::runTableClassFunction ($linkTable,'getTableLinks'));
								$deleteQuery->setTableMap(Lib\Tools::runTableClassFunction ($linkTable,'getTableMap'));
								$deleteQuery->setDeleteConfirm(true);
								$deleteQuery->exec();
							}
						}
					}
				}
				else
				{
					$arRes = Lib\Tools::runTableClassFunction ($linkTable,'getListFunc',array(
						array(
							'select' => array('ID'),
							'filter' => array(
								$linkField => $primaryId
							)
						)
					));
					if ($arRes)
					{
						foreach ($arRes as $delID)
						{
							$deleteQuery = new Query('delete');
							$deleteQuery->setDeletePrimary($delID);
							$deleteQuery->setTableLinks(Lib\Tools::runTableClassFunction ($linkTable,'getTableLinks'));
							$deleteQuery->setTableMap(Lib\Tools::runTableClassFunction ($linkTable,'getTableMap'));
							$deleteQuery->setDeleteConfirm(true);
							$deleteQuery->exec();
						}
					}
				}
			}
		}

		foreach ($arMap as $field=>$objData)
		{
			if ($objData->isPrimary())
			{
				$primaryField = $objData->getColumnName();
				$primaryObj = $objData;
				break;
			}
		}

		$sql = "DELETE FROM ".$helper->wrapQuotes($tableName);
		$sql .= " WHERE ".$helper->wrapQuotes($tableName).".";
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

		$delQuery = new Query('delete');
		$delQuery->setQueryBuildParts($sql);
		$res = $delQuery->exec();
	}

	//TODO: Протестировать
	protected function checkCanDelete($query=null)
	{
		try
		{
			if (is_null($query))
			{
				throw new Exception\ArgumentNullException('query');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		$primaryId = $query->getDeletePrimary();
		$arTableLinks = $query->getTableLinks();
		$bCanDelete = true;

		foreach ($arTableLinks as $field=>$arLinked)
		{
			foreach ($arLinked as $linkTable=>$linkField)
			{
				if (is_array($linkField))
				{
					foreach ($linkField as $linkF)
					{
						$arRes = Lib\Tools::runTableClassFunction ($linkTable,'getListFunc',array(
							array(
								'select' => array('ID'),
								'filter' => array(
									$linkF => $primaryId
								)
							)
						));
						if ($arRes)
						{
							$bCanDelete = false;
						}
					}
				}
				else
				{
					$arRes = Lib\Tools::runTableClassFunction ($linkTable,'getListFunc',array(
						array(
							'select' => array('ID'),
							'filter' => array(
								$linkField => $primaryId
							)
						)
					));
					if ($arRes)
					{
						$bCanDelete = false;
					}
				}
			}
		}

		return $bCanDelete;
	}

	protected function maskField ($field=null)
	{
		try
		{
			if (is_null($field))
			{
				throw new Exception\ArgumentNullException('field');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		$arMask = array();
		$arMask['field'] = $field;
		$first = mb_substr($field,0,1,'utf-8');
		$count = mb_strlen($field,'utf-8');
		if (
			$first == '<'
			|| $first == '>'
			|| $first == '!'
			|| $first == '='
		)
		{
			$second = mb_substr($field,1,1,'utf-8');
			if (
				$second == '<'
				|| $second == '>'
				|| $second == '!'
				|| $second == '='
			)
			{
				$arMask['mask'] = $first.$second;
				$arMask['field'] = mb_substr($field,2,$count-2,'utf-8');
			}
			else
			{
				$arMask['mask'] = $first;
				$arMask['field'] = mb_substr($field,1,$count-1,'utf-8');
			}

			return $arMask;
		}
		else
		{
			return false;
		}

	}
}