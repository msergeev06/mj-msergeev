<? include_once(__DIR__."/include/header.php");

use MSergeev\Packages\Apihelp\Lib\Sections;

if ($_REQUEST['step']=='add_section')
{
	?>
	<form action="" method="post">
		<table style="border: 0">
			<tr>
				<td>Активность</td>
				<td><input type="checkbox" name="ACTIVE" value="1" checked></td>
			</tr>
			<tr>
				<td>Название раздела</td>
				<td><input type="text" name="NAME" value=""></td>
			</tr>
			<tr>
				<td>Родительский раздел</td>
				<td>
					<select name="PARENT">
						<option value="0" selected>---Корневой раздел---</option>
						<?=Sections::showSelect()?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Сортировка</td>
				<td><input type="text" name="SORT" value="500"></td>
			</tr>
			<tr>
				<td>&nbsp;<input type="hidden" name="step" value="add_section_go"></td>
				<td><input type="submit" name="submit" value="Добавить раздел"></td>
			</tr>
		</table>
	</form>
	<?
}
elseif ($_REQUEST['step']=="add_section_go")
{
	$arParams = array(
		'NAME' => $_REQUEST['NAME'],
		'PARENT' => $_REQUEST['PARENT'],
		'SORT' => $_REQUEST['SORT']
	);
	if (isset($_REQUEST['ACTIVE'])) {
		$arParams['ACTIVE'] = true;
	}
	else
	{
		$arParams['ACTIVE'] = false;
	}

	$res = Sections::addSection($arParams);
}


$curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("apihelp")."include/footer.php"); ?>
