<?
/**
 * @global CMain $APPLICATION
 * @var array $arResult
 */
$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));

$CAjax = new CAjax;
$bxAjaxId = $CAjax->GetComponentID($component->__parent->__name, $component->__template->__name);

?>

<div class="brands-list default-row-list col-12">
    <? foreach ($arResult['ITEMS'] as $item) { ?>
        <div class="row default-row-item company-item">

            <div class="col-hidden col-sm-3">
                <div class="logo">
                    <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>
                </div>
            </div>

            <div class="col-sm-9 separator">
                <div class="description">

                    <div class="top-row">
                        <div class="region-block">
                            <? $countryId = $item['PROPERTIES']['COUNTRY']['VALUE'];
                            echo $item['DISPLAY_PROPERTIES']['COUNTRY']['LINK_SECTION_VALUE'][$countryId]['NAME']; ?>
                        </div>

                        <div class="ml-auto rating"
                             title="Средняя оценка: <?= $item['PROPERTIES']['RATING']['VALUE'] ?>">
                            <? $rating = round($item['PROPERTIES']['RATING']['VALUE']);
                            echo str_repeat('<span class="up">★</span>', $rating);
                            echo str_repeat('<span>★</span>', 5 - $rating); ?>
                        </div>
                    </div>

                    <div class="logo-mobile col-visible">
                        <img src="<?= $item['PREVIEW_PICTURE_RESIZED']['src'] ?>"/>
                    </div>

                    <div class="title">
                        <a class="black-text" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <h5><?= $item['NAME'] ?></h5>
                        </a>
                    </div>

                    <div class="preview-text">
                        <?= $item['PREVIEW_TEXT'] ?>
                    </div>

                    <div class="phone">
                        <?= $item['PROPERTIES']['PHONE']['VALUE'] ?>
                    </div>

                    <div class="type">
                        <?= implode('<span class="delimeter">|</span>', $item['PROPERTIES']['DIRECTIONS']['VALUE']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?= $arResult["NAV_STRING"] ?>
</div>

