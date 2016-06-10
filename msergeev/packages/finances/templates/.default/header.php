<?
use MSergeev\Core\Lib;
use MSergeev\Packages\Finances\Lib\Accounts;

header('Content-type: text/html; charset=utf-8');
Lib\Buffer::start("page");
Lib\Webix::init();
$path=Lib\Loader::getSitePublic('finances');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Семейные Финансы - <?=Lib\Buffer::showTitle("Главная");?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?=Lib\Buffer::showCSS()?>
	<?=Lib\Buffer::showJS()?>
</head>
<body>
<table class="finances">
	<tr>
		<td class="logo"><a href="<?=$path?>">Главная</a></td>
		<td class="menu">
			<div id="header_menu"></div>
		</td>
	</tr>
	<tr>
		<td class="left">
			<div class="buttons">
				<a href="#" class="left-button button-op">Добавить в учет</a>
				<a href="#" class="left-button button-cal">Добавить в календарь</a>
			</div>
			<div class="left-tabs">
				<div class="tab-menu">
					<div class="tab-1 active" data-id="1" title="Счета"></div>
					<div class="tab-2" data-id="2" title="Метки"></div>
					<div class="tab-3" data-id="3" title="Операции"></div>
				</div>
				<div class="tab-content">
					<div class="content-1">
						<a href="<?=$path?>add_account.php" class="add">&nbsp;&nbsp;&nbsp;&nbsp;Добавить счет</a>
						<div class="category">
						<?
						$arAccounts = Accounts::getAccountsList();
						$deploy = array(
							'LIKE'		=> Lib\Options::getOptionInt('FINANCES_DEPLOY_LIKE'),
							'MONEY'		=> Lib\Options::getOptionInt('FINANCES_DEPLOY_MONEY'),
							'ME'		=> Lib\Options::getOptionInt('FINANCES_DEPLOY_ME'),
							'I_AM'		=> Lib\Options::getOptionInt('FINANCES_DEPLOY_I_AM'),
							'INVEST'	=> Lib\Options::getOptionInt('FINANCES_DEPLOY_INVEST'),
							'ESTATE'	=> Lib\Options::getOptionInt('FINANCES_DEPLOY_ESTATE'),
							'BONUS'		=> Lib\Options::getOptionInt('FINANCES_DEPLOY_BONUS'),
							'CAPITAL'	=> Lib\Options::getOptionInt('FINANCES_DEPLOY_CAPITAL'),
							'HIDDEN'	=> Lib\Options::getOptionInt('FINANCES_DEPLOY_HIDDEN')
						);
						//msDebug($deploy);
						?>
						<?if ($arAccounts):?>
							<? $section = 'LIKE'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="1" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Избранные</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-1"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like checked"><span title="Убрать из избранного"></span></div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
												<div class="description" style="display: none">
													<table class="info">
														<?foreach($arData['ADDITIONAL'] as $arInfo):?>
														<tr>
															<td class="left"><?=$arInfo['NAME']?></td>
															<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
														</tr>
														<?endforeach;?>
													</table>
												</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'MONEY'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="2" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Деньги</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-2"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'ME'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="3" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Мне должны</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-3"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'I_AM'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="4" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Я должен</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-4"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'INVEST'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="5" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Инвестиции</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-5"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'ESTATE'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="6" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Имущество</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-6"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'BONUS'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="7" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Карты лояльности</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-7"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
							<? $section = 'CAPITAL'; ?>
							<div class="header<?=($deploy[$section])?' open':''?>" data-id="8" data-cat="<?=$section?>">
								<div class="arrow"></div>
								<div class="name">МОЙ КАПИТАЛ:</div>
							</div>
							<div id="cat-list" class="list-8"<?=(!$deploy[$section])?' style="display: none"':''?>>
								<? $i=0; ?>
								<?foreach($arAccounts['CAPITAL']['CURRENCY'] as $currency=>$arCurrency):?>
								<div class="item" data-id="<?=$i?>">
									<div class="name"><b><?=$arCurrency['SIGN']?></b></div>
									<div class="money red"><?=$arCurrency['SUM_SHOW']?></div>
									<?/*<div class="description" style="display: none"></div>*/?>
								</div>
									<? $i++; ?>
								<?endforeach;?>
								<div class="item" data-id="<?=$i?>">
									<div class="name"><b>Итого:</b></div>
									<div class="money red"><?=$arAccounts['CAPITAL']['SUM_SHOW']?>&nbsp;Р</div>
									<?/*<div class="description" style="display: none"></div>*/?>
								</div>
							</div>
							<? $section = 'HIDDEN'; ?>
							<?if (isset($arAccounts[$section]) && !empty($arAccounts[$section])):?>
								<div class="header<?=($deploy[$section])?' open':''?>" data-id="9" data-cat="<?=$section?>">
									<div class="arrow"></div>
									<div class="name">Скрытые</div>
									<div class="money<?=($arAccounts[$section]['SUM']>0)?' green':' red'?>">
										<?=$arAccounts[$section]['SUM_SHOW']?>&nbsp;Р
									</div>
								</div>
								<div id="cat-list" class="list-9"<?=(!$deploy[$section])?' style="display: none"':''?>>
									<?if(!empty($arAccounts[$section]['DATA'])):?>
										<?foreach($arAccounts[$section]['DATA'] as $id=>$arData):?>
											<div class="item" data-id="<?=$id?>">
												<div class="name"><?=substr($arData['NAME'],0,15)?></div>
												<div class="money<?=($arData['BALANCE']>0)?' green':' red'?>"><?=$arData['BALANCE_SHOW']?>&nbsp;Р</div>
												<div class="buttons" style="display: none">
													<div class="button add"><span title="Добавить операцию"></span></div>
													<div class="button edit"><span title="Редактировать"></span></div>
													<div class="button like<?=($arData['STATUS']==2)?' checked':''?>">
														<span title="<?=($arData['STATUS']==2)?'Убрать из избранного':'Добавить в избранное'?>"></span>
													</div>
													<div class="button delete"><span title="Удалить"></span></div>
												</div>
												<?if(isset($arData['ADDITIONAL']) && !empty($arData['ADDITIONAL'])):?>
													<div class="description" style="display: none">
														<table class="info">
															<?foreach($arData['ADDITIONAL'] as $arInfo):?>
																<tr>
																	<td class="left"><?=$arInfo['NAME']?></td>
																	<td class="right<?=((isset($arInfo['RED']))?' red':'')?>"><?=$arInfo['VALUE']?></td>
																</tr>
															<?endforeach;?>
														</table>
													</div>
												<?endif;?>
											</div>
										<?endforeach;?>
									<?endif;?>
								</div>
							<?endif;?>
						<?endif;?>
						</div>
					</div>
					<div class="content-2" style="display: none;">
						<a href="#" class="add">&nbsp;&nbsp;&nbsp;&nbsp;Добавить метку</a>
						<div class="labels">
							<h2>Метки</h2>
							<div class="search">
								<form name="label-search" method="post">
									<input type="text" name="search" value="">
								</form>
							</div>
							<div class="nav"></div>
							<div class="list">
								<div class="label" data-id="1">
									<div class="name">день рождения</div>
									<div class="buttons" style="display: none">
										<div class="button edit"><span title="Редактировать"></span></div>
										<div class="button delete"><span title="Удалить"></span></div>
									</div>
								</div>
								<div class="label" data-id="2">
									<div class="name">метро</div>
									<div class="buttons" style="display: none">
										<div class="button edit"><span title="Редактировать"></span></div>
										<div class="button delete"><span title="Удалить"></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="content-3" style="display: none;">
						<a href="#" class="journal">&nbsp;&nbsp;&nbsp;&nbsp;Журнал событий</a>
						<div class="planing">
							<div class="header open" data-id="1">
								<div class="arrow"></div>
								<div class="name red">Просроченные</div>
							</div>
							<div id="cat-list" class="list-1">
								<div class="plan" data-id="1">
									<div class="name">05.06<br>Квартплата</div>
									<div class="money red">-3500.00&nbsp;Р</div>
									<div class="buttons" style="display: none">
										<div class="button confirm"><span title="Подтвердить"></span></div>
										<div class="button edit"><span title="Редактировать"></span></div>
										<div class="button delete"><span title="Удалить"></span></div>
									</div>
								</div>
							</div>
							<div class="header open" data-id="2">
								<div class="arrow"></div>
								<div class="name green">Запланированные</div>
							</div>
							<div id="cat-list" class="list-2">
								<div class="plan" data-id="2">
									<div class="name">10.06<br>Заработная плата</div>
									<div class="money green">7000.00&nbsp;Р</div>
									<div class="buttons" style="display: none">
										<div class="button confirm"><span title="Подтвердить"></span></div>
										<div class="button edit"><span title="Редактировать"></span></div>
										<div class="button delete"><span title="Удалить"></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</td>
		<td class="info">
			<div class="main">
				<h1><?=MSergeev\Core\Lib\Buffer::showTitle()?></h1>
