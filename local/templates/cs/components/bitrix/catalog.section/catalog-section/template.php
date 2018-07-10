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
<div class="col default-detail catalog-section-list">

    <?php foreach ($arResult['ITEMS'] as $item) { ?>
        <div class="row default-row-item company-item">

            <div class="col-sm-3 front">
                <h4 class="text-uppercase"><?= $item['NAME'] ?></h4>

                <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                    <div class="logo">
                        <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>
                    </div>
                </a>
            </div>

            <div class="col-sm-9 separator">
                <div class="row item-info-row">
                    <div class="col-6 links">
                        <div class="title">
                            <h4 class="text-uppercase">Характеристики</h4>
                        </div>

                        <div class="props">

                            <?php
                            /*foreach (array('POWER_HEAT', 'POWER_COOL', 'POWER_INTAKE', 'NOISE') as $propCode) {*/
                            foreach (array('POWER_HEAT', 'POWER_COOL', 'POWER_INTAKE', 'NOISE', 'COMPRESSOR', 'AIRCLEAN', 'WIFI', 'PLANT', 'COLOR') as $propCode) {
				if ($item['PROPERTIES'][$propCode]['VALUE']=='' || sizeof($item['PROPERTIES'][$propCode]['VALUE'])==0) {continue;};/**/
                                ?>
                                <div>
                                    <span class="beige-accent-text"><?= $item['PROPERTIES'][$propCode]['NAME'] ?>
                                        :</span>
                                    <?php
					/*= $item['PROPERTIES'][$propCode]['VALUE'];*/
					if (is_array($item['PROPERTIES'][$propCode]['VALUE'])){
						$sep = "";
						foreach ($item['PROPERTIES'][$propCode]['VALUE'] as $val){
							echo $sep.$val;
							$sep = ', ';
						}
					} else {
						echo $item['PROPERTIES'][$propCode]['VALUE'];
					};
					?>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-6 seo separator">
                        <div class="title">
                            <h4 class="text-uppercase">Модели</h4>
                        </div>

                        <?php
                        foreach ($item['OFFERS'] as $offer) {
                            ?>
                            <div class="catalog-offer-row">
                                <a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $offer['NAME'] ?></a>
                                <?= CurrencyFormat($offer['PRICES']['BASE']['VALUE'], $offer['PRICES']['BASE']['CURRENCY']) ?>
                            </div>
                            <?php
                        }
                        ?>

                        <?= $item['PROPERTIES']['SEO']['VALUE'] ?>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>
</div>
