<?
/**
 * @global CMain $APPLICATION
 * @var array    $arResult
 */
$this->setFrameMode(true);
$currentDate = new DateTime(date("d.m.Y H:i:s", time()));

$CAjax = new CAjax;
$bxAjaxId = $CAjax->GetComponentID($component->__parent->__name, $component->__template->__name);
$phonesBlock = \BH\Frontend\Phones::COMPANY;
?>

<div class="companies-list default-row-list col-12">
	<?
    $phones = array($phonesBlock => array());
    foreach ($arResult['ITEMS'] as $item) { ?>
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
							<? $cityId = $item['PROPERTIES']['CITY']['VALUE'];
							echo $item['DISPLAY_PROPERTIES']['CITY']['LINK_ELEMENT_VALUE'][$cityId]['NAME'] ?>
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

                    <div class="address">
                        <span>Адрес: </span>
						<?= $item['PROPERTIES']['ADDRESS']['VALUE']; ?>
                    </div>

                    <div class="year">
                        <span>На рынке с </span>
						<?= $item['PROPERTIES']['YEAR']['VALUE'] ?> года
                    </div>

                    <div class="phone">
                        <?= BH\Frontend::getPhoneBlock($item['PROPERTIES']['PHONE']['VALUE'], $item['ID'], $phonesBlock);
                        $phones[$phonesBlock][$item['ID']] = $item['PROPERTIES']['PHONE']['VALUE'];
                        ?>
                    </div>

                    <div class="type">
						<?= implode('<span class="delimeter">|</span>', $item['DISPLAY_PROPERTIES']['TYPE']['DISPLAY_VALUE']) ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
	?>

    <?= $arResult["NAV_STRING"] ?>
</div>
<?php
\BH\Frontend\Phones::getInstance()->addPhones($phones);