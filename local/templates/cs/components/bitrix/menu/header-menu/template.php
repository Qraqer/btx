<?
/**
 * @var array $arResult
 * @var array $arParams
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die(); ?>

<div class="beige-accent-block ">
    <div class="container header-menu">
		<? if (!empty($arResult)):

			$extraMenu = null;
			if (defined('NEED_EXTRA_MENU')) {
				$extraMenu = '/' . NEED_EXTRA_MENU . '/';
			}
			?>
            <div class="row direction">

				<? foreach ($arResult as $arItem) {

					if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
						continue;
					?>

                    <div class="menu-item<?= $arItem['SELECTED'] ? ' active' : '' ?><?= $arItem['LINK'] == $extraMenu ? ' extra-menu' : '' ?>">
                        <a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
                    </div>
				<? } ?>
            </div>
		<? endif ?>
    </div>
</div>

