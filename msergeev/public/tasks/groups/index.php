<? include_once(__DIR__."/../include/header.php");

MSergeev\Core\Lib\Buffer::setTitle("Группы задач");
use MSergeev\Packages\Tasks\Lib;


$arResult = Lib\Groups::getGroupTree();
//msDebug($arResult);
/*
1 Общие задачи 14
	2 Домоводство 9
		3 Ежедневные дела 4
		5 Комунальные платежи 6
		7 Обслуживание 8
	10 Развлечения 13
		11 Дни рождения 12

<ul>
	1 <li>Общие задачи</li>
	<ul>
		2<li>Домоводство</li>
		<ul>
			3 <li>Ежедневные дела</li> 4
			5 <li>Комунальные платежи</li> 6
			7 <li>Обслуживание</li> 8
		9 </ul>
		<li>Развлечения</li>
		10 <ul>
			11 <li>Дни рождения</li> 12
		13 </ul>
	14 </ul>
</ul>
 */
$arUl = array(0=>"");
$strUl = "";
?>
<div class="catalog_tree">
	<ul>
		<?
		for($i=0; $i<count($arResult["ITEMS"]);$i++)
		{
			$intDepthLevel = $arResult["ITEMS"][$i]["DEPTH_LEVEL"]+2;
			$arUl[$arResult["ITEMS"][$i]["LEFT_MARGIN"]] = "";
			for ($j=0;$j<$intDepthLevel;$j++) $arUl[$arResult["ITEMS"][$i]["LEFT_MARGIN"]].="\t";
			$arUl[$arResult["ITEMS"][$i]["LEFT_MARGIN"]] .= "<li><a class=\"show-parent\" data-id=\""
				.$arResult["ITEMS"][$i]["ID"]."\" href=\"#\">".$arResult["ITEMS"][$i]["NAME"]."</a></li>\n";
			if ($arResult["ITEMS"][$i]["RIGHT_MARGIN"]>($arResult["ITEMS"][$i]["LEFT_MARGIN"]+1))
			{
				for ($j=0;$j<$intDepthLevel;$j++)
					$arUl[$arResult["ITEMS"][$i]["LEFT_MARGIN"]].="\t";
				$arUl[$arResult["ITEMS"][$i]["LEFT_MARGIN"]].="<ul>\n";
				$arUl[$arResult["ITEMS"][$i]["RIGHT_MARGIN"]] = "";
				for ($j=0;$j<$intDepthLevel;$j++) $arUl[$arResult["ITEMS"][$i]["RIGHT_MARGIN"]].="\t";
				$arUl[$arResult["ITEMS"][$i]["RIGHT_MARGIN"]] .= "</ul>\n";
			}
			else
			{
				$arUl[$arResult["ITEMS"][$i]["RIGHT_MARGIN"]] = "";
			}
		}
		for($i=0; $i<count($arUl);$i++)
			$strUl .= $arUl[$i];
		echo $strUl;
		?>
	</ul>
</div>
<div class="catalog_table">
&nbsp;test
</div>

<? include_once(MSergeev\Core\Lib\Loader::getPublic("events")."include/footer.php"); ?>
