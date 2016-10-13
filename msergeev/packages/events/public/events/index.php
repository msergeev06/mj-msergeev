<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("События"); ?>
<?
use MSergeev\Core\Lib;
$path = Lib\Tools::getSitePath(Lib\Loader::getPublic("events"));
?>

<a href="<?=$path?>events/add.php">Добавить событие</a>

<? include_once(MSergeev\Core\Lib\Loader::getPublic("events")."include/footer.php"); ?>
