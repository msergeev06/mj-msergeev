<? include_once(__DIR__."/include/header.php");?>
<div class="header">
	<div class="header_icons">
		<a href="#"><img src="" title="Home"></a>&nbsp;
		<a href="#"><img src="" title="Print"></a>
	</div>
	<div class="header_contents">
		<a href="#">Содержание</a>&nbsp;
		<a href="#">Индекс</a>&nbsp;
		<a href="#">Поиск</a>
	</div>
	<div class="header_title">
		<span>Документация по API для пользователей и разработчиков</span>
	</div>
	<div class="header_arrows">
		<a href="#">&lt;&lt;&nbsp;Назад</a>&nbsp;<a href="#">Вперед&nbsp;&gt;&gt;</a>
	</div>
</div>
<div class="content">
	<div class="tree">

	</div>
	<div class="info">

	</div>
</div>


<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("apihelp")."include/footer.php"); ?>
