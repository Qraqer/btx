<?
/**
 * @global CMain $APPLICATION
 * @var array $arResult
 */
$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));
?>

<div class="brands-list default-row-list col-12">
    <? foreach ($arResult['SECTIONS'] as $item) {
        $brand = $arResult['BRANDS'][$item['UF_BRAND']];
        $country = $arResult['COUNTRIES'][$brand['PROPERTY_COUNTRY_VALUE']];
        ?>
        <div class="row default-row-item company-item">

            <div class="col-hidden col-sm-3">
                <a href="<?= $item['SECTION_PAGE_URL'] ?>">
                    <div class="logo">
                        <img src="<?= $item['PICTURE_RESIZED']['src'] ?>"/>
                    </div>
                </a>
            </div>

            <div class="col-sm-9 separator">
                <div class="description">

                    <div class="top-row">
                        <div class="region-block">
                            <?= $country['NAME']; ?>
                        </div>

                        <div class="ml-auto rating"
                             title="Средняя оценка: <?= $brand['PROPERTY_RATING_VALUE'] ?>">
                            <? $rating = round($item['PROPERTY_RATING_VALUE']);
                            echo str_repeat('<span class="up">★</span>', $rating);
                            echo str_repeat('<span>★</span>', 5 - $rating); ?>
                        </div>
                    </div>

                    <a href="<?= $item['SECTION_PAGE_URL'] ?>">
                        <div class="logo-mobile col-visible">
                            <img src="<?= $item['PICTURE_RESIZED']['src'] ?>"/>
                        </div>
                    </a>

                    <div class="title">
                        <a class="black-text" href="<?= $item['SECTION_PAGE_URL'] ?>">
                            <h5><?= $item['NAME'] ?></h5>
                        </a>
                    </div>

                    <div class="preview-text">
                        <?= $brand['PREVIEW_TEXT'] ?>
                    </div>

                    <div class="type">
                        <?= implode('<span class="delimeter">|</span>', $brand['PROPERTY_DIRECTIONS_VALUE']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?= $arResult["NAV_STRING"] ?>
</div>

