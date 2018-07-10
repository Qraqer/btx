<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="default-detail company-detail">
    <div class="row">
        <div class="col-12">
            <img src="<?= $arResult['DETAIL_PICTURE_RESIZED']['src'] ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="preview-text">
				<?= $arResult['PREVIEW_TEXT'] ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="detail-text">
				<?= $arResult['DETAIL_TEXT'] ?>
            </div>
        </div>
    </div>


	<?php
	if (array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y") {
		?>
        <div class="news-detail-share">
            <noindex>
				<?
				$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS"          => $arParams["SHARE_HANDLERS"],
					"PAGE_URL"          => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE"        => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY"   => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE"              => $arParams["SHARE_HIDE"],
				),
					$component,
					array("HIDE_ICONS" => "Y")
				);
				?>
            </noindex>
        </div>
		<?
	}
	?>
</div>