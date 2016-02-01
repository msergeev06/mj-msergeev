<?
use MSergeev\Core\Lib;
$path = Lib\Tools::getSitePath(Lib\Loader::getPublic("tasks"));
?>
<table class="top_menu">
	<tr>
		<td><a href="<?=$path?>">Главная</a></td>
		<td><a href="<?=$path?>tasks/">Задачи</a></td>
		<td><a href="<?=$path?>groups/">Группы задач</a></td>
		<?/*<td><a href="<?=$path?>notice/">Напоминания</a></td>
		<td><a href="<?=$path?>actions/">Действия</a></td>*/?>
	</tr>
</table>