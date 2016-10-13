<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Финансовые цели"); ?>
<? $path=MSergeev\Core\Lib\Loader::getSitePublic('finances'); ?>
<a href="<?=$path?>targets/add_target.php">Добавить цель</a>


<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("finances")."include/footer.php"); ?>
