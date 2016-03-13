<?php

namespace MSergeev\Core\Lib;



use MSergeev\Core\Exception\ArgumentNullException;
use MSergeev\Core\Exception\ArgumentTypeException;

class Webix
{
	protected static
		$coreRoot = null,
		$mainJs = null,
		$mainCss = null,
		$otherCssCatalog = null;


	public static function showDataTable ($arData=null)
	{
		try
		{
			if (is_null($arData))
			{
				throw new ArgumentNullException('arData');
			}
			elseif (!is_array($arData))
			{
				throw new ArgumentTypeException('arData');
			}
			else
			{
				if (!isset($arData['grid']))
				{
					throw new ArgumentNullException ('arData[grid]');
				}
				if (!isset($arData['container']))
				{
					throw new ArgumentNullException ('arData[container');
				}
				if (!isset($arData['columns']))
				{
					throw new ArgumentNullException ('arData[columns]');
				}
				if (!isset($arData['data']))
				{
					throw new ArgumentNullException ('arData[data]');
				}
			}
		}
		catch (ArgumentNullException $e1)
		{
			die($e1->showException());
		}
		catch (ArgumentTypeException $e2)
		{
			die($e2->showException());
		}

		static::init();

		$webixJS = trim($arData['grid'])." = webix.ui({\n";
		$webixJS.= 'container:"'.trim($arData['container']).'",'."\n"
			.'view:"datatable",'."\n"
			//."id:'datatable',\n"
			."autoheight:true,\n"
			."autowidth:true,\n"
			.'editable:true,'."\n"
			.'editaction:"dblclick",'."\n"
			//.'leftSplit:1,'."\n"
			.'rightSplit:3,'."\n"
			."minHeight:50,\n"
			."footer:true,\n"
			."tooltip:true,\n"
			//."activeContent:{\n"
			//."deleteButton:{\n"
			//.'id:"deleteButtonId",'."\n".'view:"button",'."\n"
			//.'label:"Delete",'."\n".'width:50,click:deleteClick},'."\n"
			//."editButton:{\n"
			//.'id:"editButtonId",'."\n".'view:"button",'."\n"
			//.'label:"Edit",'."\n".'width:50,click:editClick}},'."\n"
			."on:{\nonAfterLoad:function(){\nif (!this.count())\n"
			.'this.showOverlay("Нет данных для отображения...");'."\n"
			."}\n},\n"
			//.'width:1000,'."\n"
			."columns:[";
		$bFirst = true;
		foreach ($arData['columns'] as $arColumns)
		{
			if ($bFirst)
			{
				$bFirst = false;
			}
			else
			{
				$webixJS.=",\n";
			}
			$webixJS.="{";

			$bFFirst = true;
			foreach ($arColumns as $key=>$value)
			{
				if ($bFFirst)
				{
					$bFFirst = false;
				}
				else
				{
					$webixJS.=",\t";
				}
				$first = substr($value,0,1);
				if ($first=='=')
				{
					$count = strlen($value);
					$value = substr($value,1,$count-1);
					$webixJS.= $key.":".$value;
				}
				else
				{
					$webixJS.= $key.':"'.$value.'"';
				}
			}

			$webixJS.="}";
		}
		$webixJS.= "],\n"."data:[\n";
		$bFirst = true;
		foreach ($arData['data'] as $arDat)
		{
			if ($bFirst)
			{
				$bFirst = false;
			}
			else
			{
				$webixJS.= ",\n";
			}
			$webixJS.= "{";

			$bFFirst = true;
			foreach ($arDat as $key=>$value)
			{
				if ($bFFirst)
				{
					$bFFirst = false;
				}
				else
				{
					$webixJS.= ",\t";
				}
				$first = substr($value,0,1);
				if ($first=='=')
				{
					$count = strlen($value);
					$value = substr($value,1,$count-1);
					$webixJS.= $key.":".$value;
				}
				else
				{
					$webixJS.= $key.':"'.$value.'"';
				}
			}

			$webixJS.= "}";
		}
		$webixJS.= "]\n";

/*		$json = array(
			'container' => trim($arData['container']),
			'view' => "datatable",
			'columns' => $arData['columns'],
			'autoheight' => true,
			'autowidth' => true,
			'data' => json_encode($arData['data'])
		);*/
		//$webixJS.= json_encode($json);
		$webixJS.= '});';

		//echo "<pre>"; var_dump($webixJS); echo "</pre>";
		Buffer::addWebixJs($webixJS, $arData['grid']);
		Buffer::addCSS(static::$otherCssCatalog.'samples.css');
	}

	protected static function init()
	{
		if (is_null(static::$coreRoot))
		{
			static::$coreRoot = Config::getConfig('CORE_ROOT');
		}
		if (is_null(static::$mainJs))
		{
			static::$mainJs = static::$coreRoot.'plugins/webix/codebase/webix.js';
		}
		if (is_null(static::$mainCss))
		{
			static::$mainCss = static::$coreRoot.'plugins/webix/codebase/webix.css';
		}
		if (is_null(static::$otherCssCatalog))
		{
			static::$otherCssCatalog = static::$coreRoot.'plugins/webix/codebase/css/';
		}
		//if
		Buffer::addJS(static::$mainJs);
		Buffer::addCSS(static::$mainCss);
	}
}