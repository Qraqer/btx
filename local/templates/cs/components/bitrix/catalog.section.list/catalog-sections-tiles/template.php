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
<div class="col default-detail brand-detail">
    <div class="row default-row-item company-item">

        <div class="col-hidden col-sm-3">
            <div class="logo">
                <img src="<?= $arResult['DETAIL_PICTURE_RESIZED']['src'] ?>"/>
            </div>
        </div>

        <div class="col-sm-9 separator">
            <div class="row item-info-row">
                <div class="col-6 links">
                    <div class="title">
                        <h4 class="text-uppercase">О бренде</h4> <a class="text-uppercase" href="#">Ещё></a>
                    </div>

                    <div class="props">
                        <div>
                            <span class="beige-accent-text">На рынке:</span>
                            с <?= $arResult['PROPERTIES']['YEAR']['VALUE'] ?> года
                        </div>

                        <div>
                            <span class="beige-accent-text">Страна:</span> <?= $arResult['PROPERTIES']['COUNTRY']['VALUE'] ?>
                        </div>

                        <div>
                            <span class="beige-accent-text">Направления:</span> <?= implode(',', $arResult['PROPERTIES']['DIRECTIONS']['VALUE']) ?>
                        </div>

                        <div>
                            <span class="beige-accent-text">Официальный сайт:</span> <a
                                    href="//<?= $arResult['PROPERTIES']['SITE']['VALUE'] ?>"><?= $arResult['PROPERTIES']['SITE']['VALUE'] ?></a>
                        </div>
                    </div>

                </div>


                <div class="col-6 seo separator">
                    <div class="title">
                        <h4 class="text-uppercase">Особенности</h4>
                    </div>

                    <?= $arResult['PROPERTIES']['SEO']['VALUE'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
