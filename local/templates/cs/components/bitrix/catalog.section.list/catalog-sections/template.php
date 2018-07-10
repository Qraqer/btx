<?
/**
 * @global CMain $APPLICATION
 * @var array $arResult
 */
$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));
?>


<div class="brands-list default-row-list col-12">
    <div class="row catalog-brand-row">
        <? foreach ($arResult['SECTIONS'] as $count => $section) { ?>
            <div class="col-sm-6 col-md-6 col-lg-4 index-element-item">
                <div class="default-item catalog-item">

                    <a href="<?= $section['SECTION_PAGE_URL'] ?>">
                    <div class="image">
                        <img src="<?= $section['PICTURE_RESIZED']['src'] ?>"/>
                    </div>
                    </a>

                    <div class="description">
                        <a class="black-text" href="<?= $section['SECTION_PAGE_URL'] ?>">
                            <strong><?= $section['NAME'] ?></strong>
                        </a>
                    </div>

                    <div class="warranty">
                        Гарантия <?= $section['UF_WARRANTY'] ?>
                    </div>

                </div>
            </div>


            <?php
            if ($arParams['USE_AD'] == 'Y' && $count == 2) {
                ?>
                <div class="col-lg-4 col-md-6 index-element-item">
                    <div class="default-item catalog-item">
                        <?= $arParams['AD_ID'] ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
        }
        ?>
    </div>
    <?= $arResult["NAV_STRING"] ?>
</div>

