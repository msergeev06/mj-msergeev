<? include_once(__DIR__."/../include/header.php");

MSergeev\Core\Lib\Buffer::setTitle("Группы задач");
use MSergeev\Packages\Tasks\Lib;


$arResult = Lib\Groups::getGroupTree();
msDebug($arResult);
/*
1 Общие задачи 14
	2 Домоводство 9
		3 Ежедневные дела 4
		5 Комунальные платежи 6
		7 Обслуживание 8
	10 Развлечения 13
		11 Дни рождения 12
 */

?>
<div class="catalog_tree">
	<ul>
		<?for($i=0; $i<count($arResult["ITEMS"]);$i++):?>
			<? $j=$i+1; ?>
		<?endfor;?>
	</ul>
	<?/*
	<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
		<?
			$nowItem = $arItem;
			if (empty($prevItem))
			{
				$prevItem=$arItem;

				continue;
			}
			else
			{
				?><li><a href=""><?=$prevItem["NAME"]?></a></li><?echo "\n";
				if ($arItem["DEPTH_LEVEL"]>$prevItem["DEPTH_LEVEL"])
				{
					?><ul><?echo "\n";
				}
				elseif ($arItem["DEPTH_LEVEL"]<$prevItem["DEPTH_LEVEL"])
				{
					?></ul><?echo "\n";
				}
				$prevItem=$arItem;
			}
		?>
	<?endforeach;?>
		<li><a href=""><?=$nowItem["NAME"]?></a></li><?echo "\n";?>
	</ul>
*/?>
</div>
<div class="catalog_table">
&nbsp;test
</div>

<? include_once(MSergeev\Core\Lib\Loader::getPublic("events")."include/footer.php"); ?>
