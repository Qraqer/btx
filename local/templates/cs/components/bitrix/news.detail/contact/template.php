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
<div class="default-detail contact-detail">
    <div class="row">
        <div class="col-12">
            <h5 class="text-uppercase"><?= $arResult['NAME'] ?></h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="preview-text">
                <?= $arResult['DETAIL_TEXT'] ?>
            </div>
        </div>
    </div>

    <?php
    if (!empty($arResult['PROPERTIES']['PHONE']['VALUE'])) {
        ?>
        <div class="row">
            <div class="col-12">
                <div class="phone">
                    <span class="beige">Телефон: </span> <?= BH\Frontend::getPhoneLinks($arResult['PROPERTIES']['PHONE']['VALUE']) ?>
                </div>
            </div>
        </div>
        <?
    }

    if (!empty($arResult['PROPERTIES']['EMAIL']['VALUE'])) {
        ?>
        <div class="row">
            <div class="col-12">
                <div class="email">
                    <span class="beige">E-mail: </span> <?= BH\Frontend::getEmailLinks($arResult['PROPERTIES']['EMAIL']['VALUE']) ?>
                </div>
            </div>
        </div>
        <?
    }
    ?>

</div>