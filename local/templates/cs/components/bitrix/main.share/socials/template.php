<?
/**
 * @var array $arResult
 * @var array $arParams
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

?>
    <div class="row social-wrap social-inner">
		<? if (strlen($arParams['TEXT']) > 0) { ?>
            <div class="col-2">
                <div class="share-text"><?= $arParams['TEXT'] ?></div>
            </div>
		<? }

		if (is_array($arResult["BOOKMARKS"]) && count($arResult["BOOKMARKS"]) > 0) {
			foreach ($arResult["BOOKMARKS"] as $name => $arBookmark) {
				?>
                <div class="bx-share-icon <?= $name ?>">
                    <div class="social-cirlce-wrap">
						<?= $arBookmark["ICON"] ?>
                    </div>
                </div>
				<?
			}
		}
		?>
    </div>
